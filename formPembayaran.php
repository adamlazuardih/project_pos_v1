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
                <center>Pembayaran</center>
            </h3>
            <br>

            <div class="row">
                <div class="col-md-6">

                    <!-- SUPPLIER CARD -->
                    <div class="card">

                        <div class="card-body">
                            <h4>Customer</h4>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md">
                                            <select class="form-control" id="" name="" onchange="">
                                                <option selected disabled>Customer</option>

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
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <h4>Nomor Nota</h4>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md">
                                            <select class="form-control" id="" name="" onchange="">
                                                <option selected disabled>No Nota</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- NOTA CARD -->
                </div>


                <div class="col-md">
                    <div class="card">
                        <div class="card-body">

                            <h4>Pembayaran</h4>
                            <div id="" class="table-responsive" width="100%">
                                <form action="" method="POST">
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
                                    <button type="submit" name="simpan" id="btnSimpan" class="btn bg-gradient-success" disabled>Simpan</button>
                                </form>
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