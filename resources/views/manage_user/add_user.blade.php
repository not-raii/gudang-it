<!-- Add Modal -->
<div class="modal fade" id="formUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog my-0 h-100 d-flex justify-content-center align-items-center">
      <div class="modal-content">
        <form method="POST" id="addUser" class="form-horizontal">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="alert alert-success my-3 mr-auto d-none" role="alert"></div>
              <div class="alert alert-danger my-3 mr-auto d-none" role="alert"></div>
              <div class="form-group">
                  <label>Nama : </label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Admin"
                  />
              </div>
              <div class="form-group">
                  <label>Role : </label>
                  <select name="role_id" id="role_id" class="form-control" >
                    <option value="" selected disabled hidden>Pilih Role</option>
                    @foreach ($role as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label>Email : </label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="admin@gudangit.com"
                 />
              </div>
              <div class="form-group editpass">
                  <label>Password : </label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
              </div>
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="action_button" id="action_button" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>