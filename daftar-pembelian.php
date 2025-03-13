<?php
require 'src/connection.php';
require 'helper/session-helper.php';

$sql_pembelian = "SELECT * FROM orders o JOIN suppliers s ON(o.SupplierID=s.SupplierID)";
$result_pembelian = mysqli_query($conn, $sql_pembelian);

function buatRupiah($angka)
{
    $hasil = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil;
}

?>

<html>

<head>
    <?php require 'src/head.html'; ?>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php require 'src/side.html'; ?>

    <main class="main-content border-radius-lg ">

        <?php require 'src/nav.html'; ?>

        <div class="container-fluid">

            <h3>
                <center>Daftar Pembelian</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <table id="scrollTable3" class="table table-bordered table-striped" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>Detail</th>
                                <th>Order ID</th>
                                <th>No. Nota</th>
                                <th>Supplier ID</th>
                                <th>Nama Suplier</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Diskon</th>
                                <th>Grand Total</th>
                                <th>Tunai</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $totalPembelian = 0;

                            if (mysqli_num_rows($result_pembelian) > 0) {
                                // output data of each row
                                $c = 1;
                                while ($row = mysqli_fetch_assoc($result_pembelian)) {
                                    $totalPembelian += $row["GrandTotalOrder"]; ?>
                                    <tr>
                                        <td><button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal" data-bs-target="#modals<?= $c; ?>" id="">
                                                View
                                            </button></a>

                                            <div class="modal fade" id="modals<?= $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">View Pembelian</h5>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <form action="">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Kode Supplier</label>
                                                                                        <input type="text" class="form-control" name="" id="" value="<?= $row["SupplierID"] ?>" disabled>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <label>Nama Supplier</label>
                                                                                        <input type="text" class="form-control" name="" id="" value="<?= $row["CompanyName"] ?>" disabled>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <label>Nomor Nota</label>
                                                                                        <input type="text" class="form-control" name="" id="" value="<?= $row["No_Nota"] ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <table id="" class="table table-bordered table-striped" style="width: 100%;">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Nama Barang</th>
                                                                                    <th>Satuan</th>
                                                                                    <th>Harga</th>
                                                                                    <th>Qty</th>
                                                                                    <th>Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php

                                                                                $sql_pembelian_view = "SELECT * FROM order_details JOIN products ON (order_details.ProductID = products.ProductID)";
                                                                                $result_pembelian_view = mysqli_query($conn, $sql_pembelian_view);

                                                                                while ($row1 = mysqli_fetch_assoc($result_pembelian_view)) {
                                                                                    if ($row1['OrderID'] == $row['OrderID']) { ?>
                                                                                        <tr>
                                                                                            <td><?= $row1['ProductID']; ?></td>
                                                                                            <td><?= $row1['ProductName']; ?></td>
                                                                                            <td><?= $row1['QuantityPerUnit']; ?></td>
                                                                                            <td><?= buatRupiah($row1['OrderPrice']); ?></td>
                                                                                            <td><?= $row1['Quantity']; ?></td>
                                                                                            <td><?= buatRupiah($row1['OrderPrice'] * $row1['Quantity']); ?></td>
                                                                                        </tr>
                                                                                <?php }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td><?= $row["OrderID"]; ?></td>
                                        <td><?= $row["No_Nota"]; ?></td>
                                        <td><?= $row["SupplierID"]; ?></td>
                                        <td><?= $row["CompanyName"]; ?></td>
                                        <td><?= $row["OrderDate"]; ?></td>
                                        <td align='right'><?= buatRupiah($row["SubTotal"]); ?></td>
                                        <td align='right'><?= $row["DiskonTransaksi"]; ?></td>
                                        <td align='right'><?= buatRupiah($row["GrandTotalOrder"]); ?></td>
                                        <td align='right'><?= buatRupiah($row["Tunai"]); ?></td>
                                    </tr>
                            <?php $c++;
                                }
                            } else {
                                echo "0 results";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-body">
                    <h4 align='center'>Total Pembelian:</h4>
                    <form action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <h4>Rp. <?= number_format($totalPembelian, '0', '', '.'); ?></h4>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>

        </div>

    </main>

    <?php
    require 'src/script.html';
    ?>

</body>

</html>