<div class="modal fade" id="edit<?= $row_supplier['SupplierID']; ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="master-supplier-update.php" method="POST">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Supplier:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["SupplierID"]; ?>" name="idsupplier_edit">
                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan/Supplier:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["CompanyName"]; ?>" name="namasupplier_edit">
                            </div>
                            <div class="form-group">
                                <label>Nama Kontak:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["ContactName"]; ?>" name="namakontak_edit">
                            </div>
                            <div class="form-group">
                                <label>Titel Kontak:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["ContactTitle"]; ?>" name="titelkontak_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alamat:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["Address"]; ?>" name="alamat_edit">
                            </div>
                            <div class="form-group">
                                <label>Kota:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["City"]; ?>" name="kota_edit">
                            </div>
                            <div class="form-group">
                                <label>Wilayah:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["Region"]; ?>" name="wilayah_edit">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["PostalCode"]; ?>" name="kodepos_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Negara:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["Country"]; ?>" name="negara_edit">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["Phone"]; ?>" name="nomortelp_edit">
                            </div>
                            <div class="form-group">
                                <label>Fax:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["Fax"]; ?>" name="fax_edit">
                            </div>
                            <div class="form-group">
                                <label>Home Page:</label>
                                <input type="text" class="form-control" value="<?= $row_supplier["HomePage"]; ?>" name="homepage_edit">
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