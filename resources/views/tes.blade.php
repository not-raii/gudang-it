@extends('templates/default')


@section('content')
                    <!-- Page Heading -->
                    <div class="page-heading d-flex justify-content-between mx-4 mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Tes Pengguna</h1>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 border-top-primary">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="font-weight-bold text-primary mt-2 ml-2">Data Pengguna</h6>
                            <div>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formAddUser">Tambah <i class="fas fa-plus fa-sm ml-1"></i></button>
                                <a class="btn btn-primary" href="{{ route('export.barang.pdf') }}" >Export PDF <i class="fas fa-download fa-sm ml-1"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" id="dataTableUser" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @include('add_tes')

                </div>
                
@endsection