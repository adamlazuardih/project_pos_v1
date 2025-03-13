<?php
require 'src/connection.php';
require 'helper/session-helper.php';

$sql_supplier = "SELECT * FROM suppliers
                          ORDER BY SupplierID";
$result_supplier = mysqli_query($conn, $sql_supplier);

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
                <center>Master Supplier</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <table id="tabelSupplier" class="table table-bordered table-striped" width="100%">
                        <thead class="table-light">
                            <tr>

                                <th>Edit</th>
                                <th>ID Supplier</th>
                                <th>Nama Perushaan/Supplier</th>
                                <th>Nama Kontak</th>
                                <th>Titel Kontak</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Wilayah</th>
                                <th>Kode Pos</th>
                                <th>Negara</th>
                                <th>Nomor Telepon</th>
                                <th>Fax</th>
                                <th>Home Page</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($result_supplier) > 0) {
                                while ($row_supplier = mysqli_fetch_assoc($result_supplier)) { ?>
                                    <tr>
                                        <td><button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row_supplier['SupplierID']; ?>" name="">
                                                Edit
                                            </button></a>
                                        <td><?= $row_supplier['SupplierID']; ?></td>
                                        <td><?= $row_supplier['CompanyName']; ?></td>
                                        <td><?= $row_supplier['ContactName']; ?></td>
                                        <td><?= $row_supplier['ContactTitle']; ?></td>
                                        <td><?= $row_supplier['Address']; ?></td>
                                        <td><?= $row_supplier['City']; ?></td>
                                        <td><?= $row_supplier['Region']; ?></td>
                                        <td><?= $row_supplier['PostalCode']; ?></td>
                                        <td><?= $row_supplier['Country']; ?></td>
                                        <td><?= $row_supplier['Phone']; ?></td>
                                        <td><?= $row_supplier['Fax']; ?></td>
                                        <td><?= $row_supplier['HomePage']; ?></td>
                                    </tr>
                                    <?php require 'master-supplier-updateModal.php'; ?>
                            <?php }
                            } else {
                                echo "0 results";
                            } ?>
                        </tbody>
                    </table>

                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalInputSupplier">
                        Input Supplier
                    </button>

                    <?php require 'master-supplier-inputModal.php'; ?>

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