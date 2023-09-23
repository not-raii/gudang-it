<!-- Edit Modal -->
{{-- <div class="modal fade my-auto" id="formEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Edit Karyawan</h5>
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
                <select name="role_id" class="form-control">
                  <option value="" selected disabled hidden>Pilih Role</option>
                  @foreach ($role as $item)
                  <option value="{{ $item->id }}" {{isset($role) ? ($item->id ? 'selected' : '') : ''}}>{{ $item->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                <label>Email : </label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group editpass">
                <label>Password : </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
            </div>
            <div class="form-group">
              <small>Repeat Password</small>
              <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password">
            </div>
            <input type="hidden" name="action" id="action" value="Edit" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="action_button" id="action_button" value="Update" class="btn btn-primary">
        </div>
      </div>
    </div>
  </div> --}}