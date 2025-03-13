<?php
require 'src/connection.php';
require 'helper/session-helper.php';


$sql = "SELECT * FROM products p 
                 JOIN categories c 
                 ON(p.CategoryID=c.CategoryID) 
                 JOIN suppliers s 
                 ON(p.SupplierID=s.SupplierID) 
                 ORDER BY CategoryName, ProductName";
$result = mysqli_query($conn, $sql);

$sql_supplier_option = "SELECT SupplierID, CompanyName FROM suppliers";
$result_supplier_option = mysqli_query($conn, $sql_supplier_option);

$sql_kategori_option = "SELECT CategoryID, CategoryName FROM categories";
$result_kategori_option = mysqli_query($conn, $sql_kategori_option);

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
                <center>Master Barang</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <table id="scrollTable3" class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>Edit</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Keterangan Barang</th>
                                <th>Nama Suplier</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Diskon</th>
                                <th>Stok</th>
                                <th>Stok Display</th>
                                <th>Stok Minimum</th>
                                <th>Tingkat Penjualan</th>
                                <th>Tanggal Expired</th>
                                <th>Discontinue</th>
                                <th>Satuan Terkecil</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require 'src/connection.php';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row['ProductID']; ?>" name="simpan">
                                                Edit
                                            </button></a>
                                        </td>
                                        <td><?= $row['ProductID']; ?></td>
                                        <td><?= $row["ProductName"]; ?></td>
                                        <td><?= $row["RemarkProduct"]; ?></td>
                                        <td><?= $row["CompanyName"]; ?></td>
                                        <td><?= $row["CategoryName"]; ?></td>
                                        <td><?= $row["QuantityPerUnit"]; ?></td>
                                        <td align='right'><?= buatRupiah($row["UnitPrice"]); ?></td>
                                        <td align='right'><?= buatRupiah($row["SalePrice"]); ?></td>
                                        <td><?= $row["Discon"]; ?></td>
                                        <td><?= $row["UnitsInStock"]; ?></td>
                                        <td><?= $row["UnitsOnDisplay"]; ?></td>
                                        <td><?= $row["MinStock"]; ?></td>
                                        <td><?= $row["ReorderLevel"]; ?></td>
                                        <td><?= $row["ExpiredDate"]; ?></td>
                                        <td><?= $row["Discontinued"]; ?></td>
                                        <td><?= $row["SatuanTerkecil"]; ?></td>
                                    </tr>

                                    <?php require 'list-barang-updateModal.php'; ?>
                            <?php }
                            } else {
                                echo "0 results";
                            } ?>
                        </tbody>
                    </table>

                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalInputBarang">
                        Input Barang
                    </button>

                    <?php require 'list-barang-inputModal.php'; ?>

                </div>

            </div>
        </div>
    </main>

    <?php
    require 'src/script.html';
    ?>

    <script>

    </script>

</body>

</html>

