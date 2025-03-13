<div id="edit<?= $row_category['CategoryID']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="master-kategori-update.php" method="POST">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID Kategori:</label>
                                <input type="text" class="form-control" value="<?= $row_category["CategoryID"]; ?>" name="idkategori_edit">
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori:</label>
                                <input type="text" class="form-control" value="<?= $row_category["CategoryName"]; ?>" name="namakategori_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keterangan:</label>
                                <input type="text" class="form-control" value="<?= $row_category["Description"]; ?>" name="keterangan_edit">
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