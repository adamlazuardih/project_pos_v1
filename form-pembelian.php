<?php

require 'src/connection.php';
require 'helper/session-helper.php';

$sql_kode_supplier = "SELECT SupplierID, CompanyName FROM suppliers";
$result_kode_supplier = mysqli_query($conn, $sql_kode_supplier);

$sql2 = "SELECT CategoryID, CategoryName FROM categories";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM products";
$result3 = mysqli_query($conn, $sql3);

?>

<html>

<head>
    <?php require 'src/head.html'; ?>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php require 'src/side.html'; ?>

    <main class="main-content border-radius-lg">
        <!-- position-relative max-height-vh-100 h-100 mt-1 -->

        <?php require 'src/nav.html'; ?>

        <div class="container-fluid py-4">

            <h3>
                <center>Pembelian</center>
            </h3>
            <br>

            <div class="row">
                <div class="col-md-6">

                    <!-- SUPPLIER CARD -->
                    <div class="card">

                        <div class="card-body">

                            <h4>Supplier</h4>
                            <form action="form-pembelian-sql.php" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md">
                                            <select class="form-control" id="supplier" name="supplier" onchange="">
                                                <option selected disabled>Kode Supplier</option>
                                                <?php if (mysqli_num_rows($result_kode_supplier) > 0) {
                                                    while ($row1 = mysqli_fetch_assoc($result_kode_supplier)) { ?>
                                                        <option value="<?= $row1['SupplierID']; ?>"><?= $row1['CompanyName']; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- NOTA CARD -->
                    <form action="form-pembelian-sql.php" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <h4>Nomor Nota</h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md">
                                            <input type="text" class="form-control" name="nota" id="nota">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- NOTA CARD -->
                </div>

                <div class="col-md-6">
                    <!-- INPUT BARANG CARD -->
                    <form action="">
                        <div class="card">
                            <div class="card-body">
                                <h4>Input Barang</h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" min="0" value="" class="form-control" name="kodeBarang" id="kodeBarang_js" placeholder="Kode Barang" disabled>
                                            <!-- <option selected disabled>Kode Barang</option> -->
                                            <?php if (mysqli_num_rows($result3) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result3)) { ?>
                                                    <option hidden id="<?= $row1["ProductID"] . 'harga' ?>"><?= $row1["UnitPrice"] ?></option>
                                                    <option hidden id="<?= $row1["ProductID"] . 'namaB' ?>"><?= $row1["ProductName"] ?></option>
                                                    <option hidden id="<?= $row1["ProductID"] . 'satuan' ?>"><?= $row1["QuantityPerUnit"] ?></option>
                                            <?php }
                                            } ?>
                                            </input>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" min="1" value="1" class="form-control" name="jumlahBarang" id="jumlahBarang_js" placeholder="Jumlah Barang" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="hargaBarang" id="hargaBarang_js" placeholder="Harga" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="namaBarang" id="namaBarang_js" placeholder="Nama" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="satuanBarang" id="satuanBarang_js" placeholder="Satuan" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="totalHarga" id="totalHarga_js" placeholder="Total" disabled>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="btnTambah" class="btn bg-gradient-success" onclick="addorder()" disabled>Tambah</button>
                                <button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal" data-bs-target="#modals" id="">Kode Barang</button>

                                <?php require 'form-pembelian-modalKode.php' ?>
                            </div>
                        </div>
                    </form>

                    <!-- INPUT BARANG CARD -->
                </div>

                <div class="col-md-6">

                    <form action="form-pembelian-sql.php" method="POST">
                        <input type="hidden" name="items" id="items">
                        <input type="hidden" name="notaForm" id="notaForm">
                        <input type="hidden" name="supplierForm" id="supplierForm">
                        <div class="card">
                            <div class="card-body">
                                <h4>Pembayaran</h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="subTotalForm" id="subTotalForm" placeholder="Sub Total" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="diskonForm" id="diskonForm" onchange="fungsiForm()" onkeyup="pembayaranCheck()" placeholder="Diskon" disabled>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control" name="grandTotalForm" id="grandTotalForm" placeholder="Grand Total" readonly>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="tunaiForm" id="tunaiForm" onchange="fungsiKembalian()" onkeyup="pembayaranCheck()" placeholder="Tunai" disabled>
                                        </div>

                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="kembaliForm" id="kembaliForm" placeholder="Kembalian" readonly>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                                <button type="submit" name="simpan" id="btnSimpan" class="btn bg-gradient-success" disabled>Simpan</button>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md">
                    <div class="card">
                        <div class="card-body">

                            <h4>Pembelian</h4>
                            <div id="orderList" class="table-responsive" width="100%">
                                <table class="table table-striped align-items-center mb-0" id="dt">
                                    <thead>
                                        <tr>
                                            <th>Hapus</th>
                                            <th>ID</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dat">

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="d-flex justify-content-center">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php
    require 'src/script.html';
    require 'src/scriptOrder.html';
    ?>

    <script>

    </script>


</body>

</html>

