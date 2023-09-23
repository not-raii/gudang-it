@extends('templates/default')


@section('content')
                    <!-- Page Heading -->
                    <div class="page-heading d-flex justify-content-between mx-4 mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Manajemen Roles</h1>
                        <a class="btn btn-success" href="{{url('add_role')}}">+ Tambah</a>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 border-top-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Roles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>@sortablelink('name', 'Role')</th>
                                            <th>Aksi</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1 + (($roles->currentPage() -1 ) * $roles->perPage());
                                        @endphp
                                        @foreach ($roles as $role)    
                                        <tr>
                                            <td class="number">{{ $no++ }}.</td>
                                            <td class="text-capitalize">{{ $role->name}}</td>
                                            <td>
                                                <form method="POST" action="{{ route('delete.role', $role->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{ route('update.role', $role->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                     
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                {!! $roles->appends(Request::except('page'))->render() !!}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection