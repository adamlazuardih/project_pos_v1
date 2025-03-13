<?php

require 'src/connection.php';
require 'helper/session-helper.php';

$sql_supplier = "SELECT * FROM suppliers ORDER BY CompanyName";
$result_supplier = mysqli_query($conn, $sql_supplier);

?>

<div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Supplier</h5>
            </div>

            <div class="modal-body">


                        <table id="scrollTable3" class="table table-bordered table-striped" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                    <th>Title</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Kode Pos</th>
                                    <th>Negara</th>
                                    <th>Telp</th>
                                    <th>Fax</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result_supplier)) {
                                    while ($row_supplier = mysqli_fetch_assoc($result_supplier)) { ?>
                                        <tr>
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
                                <?php }
                                } else {
                                    echo "0 results";
                                } ?>
                            </tbody>
                        </table>

                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>