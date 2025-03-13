<?php
require 'src/connection.php';
require 'helper/session-helper.php';

$sql_category = "SELECT * FROM categories
                          ORDER BY CategoryID";
$result_category = mysqli_query($conn, $sql_category);

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
                <center>Master Kategori</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <table id="tabelKategori" class="table table-bordered table-striped" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>Edit</th>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($result_category) > 0) {
                                while ($row_category = mysqli_fetch_assoc($result_category)) { ?>
                                    <tr>
                                        <td><button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row_category['CategoryID']; ?>" name="">
                                                Edit
                                            </button></a>
                                        <td><?= $row_category['CategoryID']; ?></td>
                                        <td><?= $row_category['CategoryName']; ?></td>
                                        <td><?= $row_category['Description']; ?></td>
                                        <td><?= $row_category['Picture']; ?></td>
                                    </tr>
                                    <?php require 'master-kategori-updateModal.php'; ?>
                            <?php }
                            } else {
                                echo "0 results";
                            } ?>
                        </tbody>
                    </table>

                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalInputKategori">
                        Input Kategori
                    </button>

                    <?php require 'master-kategori-inputModal.php'; ?>

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