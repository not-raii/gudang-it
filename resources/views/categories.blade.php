@extends('templates/default')


@section('content')
                    <!-- Page Heading -->
                    <div class="page-heading d-flex justify-content-between mx-4 mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Kategori Barang</h1>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 border-top-primary">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="font-weight-bold text-primary mt-2 ml-2">Data Kategori Barang</h6>
                            <div>
                                <a class="btn btn-success" href="{{ route('add.kategori') }}">+ Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>@sortablelink('nama_kategori', 'Kategori')</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                             $no = 1 + (($data->currentPage()-1) * $data->perPage());
                                        @endphp
                                        @foreach ($data as $row)    
                                        <tr>
                                            <td class="number">{{ $no++ }}.</td>
                                            <td class="text-capitalize">{{ $row->nama_kategori }}</td>
                                            <td>
                                                {{-- <div>
                                                    <a href="/edit_kategori_barang/{{ $row->id }}" class="btn btn-primary">Edit</a>
                                                    <a href="/delete_category/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                                                </div> --}}
                                                <form method="POST" action="{{ route('delete.kategori', $row->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{ route('update.kategori', $row->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach                                     
                                    </tbody>
                                </table>
                                {!! $data->appends(Request::except('page'))->render() !!}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection