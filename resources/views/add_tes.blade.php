<!-- Add Modal -->
<div class="modal fade my-auto" id="formAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <span id="form_result"></span>
            <div class="form-group">
                <label>Nama : </label>
                <input type="text" name="name" id="name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Role : </label>
                <input type="text" name="name" id="name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Email : </label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group editpass">
                <label>Password : </label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>
            <input type="hidden" name="action" id="action" value="Tambah" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>