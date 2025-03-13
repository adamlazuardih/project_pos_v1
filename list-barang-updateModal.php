<div id="edit<?= $row['ProductID']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Barang</h4>
            </div>

            <?php
            $sql_supplier_edit = "SELECT SupplierID, CompanyName FROM suppliers";
            $result_supplier_edit = mysqli_query($conn, $sql_supplier_edit);

            $sql_kategori_edit = "SELECT CategoryID, CategoryName FROM categories";
            $result_kategori_edit = mysqli_query($conn, $sql_kategori_edit);
            ?>

            <div class="modal-body">
                <form action="list-barang-update.php" method="POST">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Kode:</label>
                                <input type="text" class="form-control" value="<?= $row["ProductID"]; ?>" name="kode_edit">
                            </div>
                            <div class="form-group">
                                <label>Nama:</label>
                                <input type="text" class="form-control" value="<?= $row["ProductName"]; ?>" name="nama_edit">
                            </div>
                            <div class="form-group">
                                <label>Keterangan:</label>
                                <input type="text" class="form-control" value="<?= $row["RemarkProduct"]; ?>" name="keterangan_edit">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori_edit">
                                    <option value="<?= $row["CategoryID"]; ?>"><?= $row["CategoryName"] ?></option>
                                    <?php if (mysqli_num_rows($result_kategori_edit) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result_kategori_edit)) { ?>
                                            <option value="<?= $row1["CategoryID"]; ?>"><?= $row1["CategoryName"]; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Satuan:</label>
                                <input type="text" class="form-control" value="<?= $row["QuantityPerUnit"]; ?>" name="satuan_edit">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli:</label>
                                <input type="text" class="form-control" value="<?= $row["UnitPrice"]; ?>" name="hargabeli_edit">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual:</label>
                                <input type="text" class="form-control" value="<?= $row["SalePrice"]; ?>" name="hargajual_edit">
                            </div>

                            <div class="form-group">
                                <label>Stok Jumlah:</label>
                                <input type="text" class="form-control" value="<?= $row["UnitsInStock"]; ?>" name="stokjumlah_edit">
                            </div>
                            <label>Satuan Terkecil:</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    Yes
                                    <?= $row['SatuanTerkecil'] == 'y' 
                                    ?  '<input type="checkbox" class="form-check-input" value="y" name="satuanterkecil_edit" checked>' 
                                    : '<input type="checkbox" class="form-check-input" value="y" name="satuanterkecil_edit" >'
                                    ?>
                                    
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control" name="supplier_edit">
                                    <option value="<?= $row['SupplierID']; ?>"><?= $row['CompanyName'] ?></option>
                                    <?php if (mysqli_num_rows($result_supplier_edit) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($result_supplier_edit)) { ?>
                                            <option value="<?= $row2['SupplierID']; ?>"><?= $row2['CompanyName']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stok Min:</label>
                                <input type="text" class="form-control" value="<?= $row["MinStock"]; ?>" name="stokmin_edit">
                            </div>
                            <div class="form-group">
                                <label>Expired:</label>
                                <input type="date" class="form-control" value="<?= $row["ExpiredDate"]; ?>" name="expired_edit">
                            </div>
                            <div class="form-group">
                                <label>Diskon:</label>
                                <input type="text" class="form-control" value="<?= $row["Discon"]; ?>" name="diskon_edit">
                            </div>
                            <div class="form-check-inline">
                                <label>Diskontinu:</label>
                                <br>
                                <?php if($row['Discontinued'] == "y"){?>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="diskontinu_edit" value="y" checked>Yes
                                    </label>
                                </div>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="diskontinu_edit" value="n">No
                                </label>
                                <?php } else {?>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="diskontinu_edit" value="y">Yes
                                    </label>
                                </div>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="diskontinu_edit" value="n" checked>No
                                </label>
                            <?php } ?>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="simpan" class="btn bg-gradient-primary">Simpan</button>

                </form>
            </div>
        </div>

    </div>
</div>