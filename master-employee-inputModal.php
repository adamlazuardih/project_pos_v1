<div class="modal fade" id="modalInputEmployee" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="master-employee-input.php" method="POST">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID Employee:</label>
                                <input type="text" class="form-control" name="idemployee" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" class="form-control" name="firstname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Title of Courtesy:</label>
                                <input type="text" class="form-control" name="titleofcourtesy">
                            </div>
                            <div class="form-group">
                                <label>Employee Password:</label>
                                <input type="text" class="form-control" name="password" required>
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