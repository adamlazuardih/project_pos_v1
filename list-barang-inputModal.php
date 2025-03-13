<div class="modal fade" id="modalInputBarang" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="list-barang-input.php" method="POST">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Kode:</label>
                                <input type="text" class="form-control" name="kode">
                            </div>
                            <div class="form-group">
                                <label>Nama:</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Keterangan:</label>
                                <input type="text" class="form-control" name="keterangan">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option>Uncategorized</option>
                                    <?php if (mysqli_num_rows($result_kategori_option) > 0) {
                                        while ($row3 = mysqli_fetch_assoc($result_kategori_option)) { ?>
                                            <option value="<?= $row3['CategoryID']; ?>"><?= $row3['CategoryName']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Satuan:</label>
                                <input type="text" class="form-control" name="satuan">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli:</label>
                                <input type="text" class="form-control" name="hargabeli">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual:</label>
                                <input type="text" class="form-control" name="hargajual">
                            </div>
                            <div class="form-group">
                                <label>Stok Jumlah:</label>
                                <input type="text" class="form-control" name="stokjumlah">
                            </div>
                            <label>Satuan Terkecil:</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="y" name="satuanterkecil">Yes
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control" name="supplier">
                                    <option>Supplier</option>
                                    <?php if (mysqli_num_rows($result_supplier_option) > 0) {
                                        while ($row4 = mysqli_fetch_assoc($result_supplier_option)) { ?>
                                            <option value="<?= $row4['SupplierID']; ?>"><?= $row4['CompanyName']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stok Min:</label>
                                <input type="text" class="form-control" name="stokmin">
                            </div>
                            <div class="form-group">
                                <label>Expired:</label>
                                <input type="date" class="form-control" name="expired">
                            </div>
                            <div class="form-group">
                                <label>Diskon:</label>
                                <input type="text" class="form-control" name="diskon">
                            </div>
                            <div class="form-check-inline">
                                <label>Diskontinu:</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="diskontinu" value="y">Yes
                                    </label>
                                </div>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="diskontinu" value="n">No
                                </label>
                            </div>

                        </div>
                    </div>

                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn bg-gradient-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>