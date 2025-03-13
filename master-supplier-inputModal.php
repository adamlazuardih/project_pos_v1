<div class="modal fade" id="modalInputSupplier" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="master-supplier-input.php" method="POST">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Supplier:</label>
                                <input type="text" class="form-control" name="idsupplier">
                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan/Supplier:</label>
                                <input type="text" class="form-control" name="namasupplier">
                            </div>
                            <div class="form-group">
                                <label>Nama Kontak:</label>
                                <input type="text" class="form-control" name="namakontak">
                            </div>
                            <div class="form-group">
                                <label>Titel Kontak:</label>
                                <input type="text" class="form-control" name="titelkontak">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alamat:</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>Kota:</label>
                                <input type="text" class="form-control" name="kota">
                            </div>
                            <div class="form-group">
                                <label>Wilayah:</label>
                                <input type="text" class="form-control" name="wilayah">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos:</label>
                                <input type="text" class="form-control" name="kodepos">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Negara:</label>
                                <input type="text" class="form-control" name="negara">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon:</label>
                                <input type="text" class="form-control" name="nomortelp">
                            </div>
                            <div class="form-group">
                                <label>Fax:</label>
                                <input type="text" class="form-control" name="fax">
                            </div>
                            <div class="form-group">
                                <label>Home Page:</label>
                                <input type="text" class="form-control" name="homepage">
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