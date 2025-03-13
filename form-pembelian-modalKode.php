<?php

require 'src/connection.php';
require 'helper/session-helper.php';

$sql_kode = "SELECT * FROM products p
                      JOIN categories c
                      ON(p.CategoryID = c.CategoryID)
                      JOIN suppliers s
                      ON(p.SupplierID = s.SupplierID)
                      ORDER BY CategoryName, ProductName";
$result_kode = mysqli_query($conn, $sql_kode);

function buatRupiah($angka)
{
    $hasil = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil;
}

?>

<div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Kode Barang</h5>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

            <div class="modal-body">

                <table id="tabelKode" class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Keterangan Barang</td>
                            <td>Kategori</td>
                            <td>Satuan</td>
                            <td>Harga Jual</td>
                            <td>Diskon</td>
                            <td>Stok</td>
                            <td>Tanggal Expired</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result_kode)) {
                            while ($row_kode = mysqli_fetch_assoc($result_kode)) { ?>
                                <tr>
                                    <td><?= $row_kode['ProductID']; ?></td>
                                    <td><?= $row_kode['ProductName']; ?></td>
                                    <td><?= $row_kode['RemarkProduct']; ?></td>
                                    <td><?= $row_kode['CategoryName']; ?></td>
                                    <td><?= $row_kode['QuantityPerUnit']; ?></td>
                                    <td align='right'><?= buatRupiah($row_kode["SalePrice"]); ?></td>
                                    <td><?= $row_kode['Discon']; ?></td>
                                    <td><?= $row_kode['MinStock']; ?></td>
                                    <td><?= $row_kode['ExpiredDate']; ?></td>
                                </tr>
                        <?php }
                        } else {
                            echo "0 results";
                        } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>