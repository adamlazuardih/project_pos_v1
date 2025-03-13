<div class="modal fade" id="modalInputKategori" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="master-kategori-input.php" method="POST">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID Kategori:</label>
                                <input type="text" class="form-control" name="idkategori">
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori:</label>
                                <input type="text" class="form-control" name="namakategori">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keterangan:</label>
                                <input type="text" class="form-control" name="keterangan">
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