<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['submit'])) {

    $idemployee     = $_POST['idemployee'];
    $lastname   = $_POST['lastname'];
    $firstname     = $_POST['firstname'];
    $title     = $_POST['title'];
    $titleofcourtesy   = $_POST['titleofcourtesy'];
    $birthdate     = $_POST['birthdate'];
    $hiredate     = $_POST['hiredate'];
    $address   = $_POST['address'];
    $city     = $_POST['city'];
    $region     = $_POST['region'];
    $postalcode   = $_POST['postalcode'];
    $country     = $_POST['country'];
    $phone     = $_POST['phone'];
    $photo   = $_POST['photo'];
    $notes     = $_POST['notes'];
    $reportsto     = $_POST['reportsto'];
    $employeepassword   = $_POST['employeepassword'];
    $pembelian     = $_POST['pembelian'];

    $sql = "INSERT INTO employees VALUES ('$idemployee', '$lastname', '$firstname',
                                          '$title', '$titleofcourtesy', '$birthdate',
                                          '$hiredate', '$address', '$city',
                                          '$region', '$postalcode', '$country',
                                          '$phone', '$photo', '$notes',
                                          '$reportsto', '$employeepassword', '$pembelian')";

    if (mysqli_query($conn, $sql)) { ?>
        <script>
            window.location.href = "master-employee.php";
        </script>
<?php } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} ?>

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

                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

</td>