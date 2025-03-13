<?php
require 'src/connection.php';
require 'helper/session-helper.php';

$sql_lapstock = "SELECT products.ProductID, products.ProductName, stock_awal.Qty, SUM(order_details.Quantity) as sumqty, products.UnitsInStock
                 FROM products 
                 LEFT JOIN order_details 
                 ON (products.ProductID = order_details.ProductID) 
                 JOIN stock_awal
                 ON (stock_awal.ProductID = order_details.ProductID)
                 GROUP BY products.ProductName";
$result_lapstock = mysqli_query($conn, $sql_lapstock);


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
                <center>Laporan Stock</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <table id="tabelLapStock" class="table table-bordered table-striped" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>Detail</th>
                                <th>Product ID</th>
                                <th>Nama Product</th>
                                <th>Quantity Stock Awal</th>
                                <th>Jumlah Order</th>
                                <th>Quantity Stock Terakhir</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($result_lapstock) > 0) {
                                $c = 1;
                                while ($row_lapstock = mysqli_fetch_assoc($result_lapstock)) { ?>
                                    <tr>
                                        <td><button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal" data-bs-target="#modals<?= $c; ?>" id="">
                                                View
                                            </button></a>

                                            <div class="modal fade" id="modals<?= $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">View Laporan Stock</h5>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <table id="tabelLapStock" class="table table-bordered table-striped" style="width: 100%;">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th>Order ID</th>
                                                                                    <th>Nama Barang</th>
                                                                                    <th>ID Barang</th>
                                                                                    <th>Harga Order</th>
                                                                                    <th>Quantity Order</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php

                                                                                $sql_lapstock_view = "SELECT order_details.OrderID ,products.ProductName, products.ProductID, order_details.OrderPrice, order_details.Quantity
                                                                                                      FROM products
                                                                                                      LEFT JOIN order_details 
                                                                                                      ON(products.ProductID = order_details.ProductID)
                                                                                                      ORDER BY products.ProductName";
                                                                                $result_lapstock_view = mysqli_query($conn, $sql_lapstock_view);

                                                                                while ($row1 = mysqli_fetch_assoc($result_lapstock_view)) {
                                                                                    if ($row1['ProductID'] == $row_lapstock['ProductID']) { ?>
                                                                                        <tr>
                                                                                            <td><?= $row1['OrderID']; ?></td>
                                                                                            <td><?= $row1['ProductName']; ?></td>
                                                                                            <td><?= $row1['ProductID']; ?></td>
                                                                                            <td><?= buatRupiah($row1['OrderPrice']); ?></td>
                                                                                            <td><?= $row1['Quantity']; ?></td>
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

                                        <td><?= $row_lapstock["ProductID"]; ?></td>
                                        <td><?= $row_lapstock["ProductName"]; ?></td>
                                        <td><?= $row_lapstock["Qty"]; ?></td>
                                        <td><?= $row_lapstock["sumqty"]; ?></td>
                                        <td><?= $row_lapstock["UnitsInStock"]; ?></td>

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

        </div>

    </main>

    <?php
    require 'src/script.html';
    ?>

</body>

</html>