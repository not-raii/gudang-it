@extends('templates/default')


@section('content')
                    <!-- Page Heading -->
                    <div class="page-heading d-flex justify-content-between mx-4 mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Manajemen Pengguna</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 border-top-primary">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="font-weight-bold text-primary mt-2 ml-2">Data Pengguna</h6>
                            <div>
                                <button type="button" id="create_record" class="btn btn-success" data-toggle="modal" data-target="#formAddUser">Tambah <i class="fas fa-plus fa-sm ml-1"></i></button>
                                <a class="btn btn-primary" href="{{ route('export.user') }}" >Export PDF <i class="fas fa-download fa-sm ml-1"></i></a>
                            </div>
                        </div>
                        <div class="card-body">

                                {{-- <form action="{{route('manage.user')}}" method="GET" class="d-sm-inline-block form-inline">
                                    @csrf
                                    <div class="d-inline-block">
                                        <label>Nama Pengguna</label>
                                        <input type="text" name="name" id="name" class="form-control mr-3" placeholder="Robert" value="{{ request('name') }}"/>
                                    </div>
                                    <div class="d-inline-block">
                                        <label>Role Pengguna</label>
                                        <select name="role" class="form-control mr-3">
                                            <option selected disabled>Pilih Role</option>
                                            @foreach ($roles as $item)
                                            <option value="{{$item->id}}"> {{ $item->name }} </option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </form>  --}}

                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="tableUser" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @include('manage_user.add_user')
                    {{-- @include('manage_user.edit_user') --}}

                       <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" id="sample_form" class="form-horizontal">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                                    </div>
                                </form>  
                                </div>
                                </div>
                            </div>

                </div>
                <!-- /.container-fluid -->
                
@endsection