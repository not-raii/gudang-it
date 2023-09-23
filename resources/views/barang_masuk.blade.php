@extends('templates/default')


@section('content')
                    <!-- Page Heading -->
                    <div class="page-heading d-flex justify-content-between mx-4 mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 border-top-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang  Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <form action="{{route('barang.masuk')}}" method="GET" class="d-sm-inline-block form-inline">
                                    @csrf
                                    <div class="d-inline-block">
                                        <label>Cari Data Barang</label>
                                        <input type="text" name="search" class="form-control mr-3" placeholder="Search"/>
                                    </div>
                                    <div class="d-inline-block">
                                        <label>Tanggal</label>
                                        <input type="date" name="date" class="form-control mr-3"/>
                                    </div>
                                    <div class="d-inline-block">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control mr-3">
                                            <option selected disabled>Kategori</option>
                                            @foreach ($cat as $item)
                                            <option value="{{ $item->id }}"> {{ $item->nama_kategori }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </form> 
                                <div class="mt-4">
                                    <a class="btn btn-danger" href="{{ route('export.pdf') }}" >Export PDF <i
                                        class="fas fa-download fa-sm ml-1"></i></a>
                                    <a class="btn btn-success" href="add_stock_in">+ Tambah</a>
                                </div>
                          </div>

                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>@sortablelink('codes_id', 'Kode Barang')</th>
                                            <th>@sortablelink('categories_id', 'Kategori Barang')</th>
                                            <th>@sortablelink('nama_barang', 'Nama Barang')</th>
                                            <th>@sortablelink('tgl_masuk', 'Tanggal')</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1 + (($data->currentPage() -1 ) * $data->perPage());
                                        @endphp
                                        @foreach ($data as $row)    
                                        <tr>
                                            <td class="number">{{ $no++ }}.</td>
                                            <td class="text-capitalize">{{ $row->codes->kode_barang??null}}</td>
                                            <td class="text-capitalize">{{ $row->codes->categories->nama_kategori}}</td>
                                            <td class="text-capitalize">{{ $row->codes->nama_barang??null}}</td>
                                            <td class="text-capitalize">{{ $row->tgl_masuk }}</td>
                                            <td class="text-capitalize">{{ $row->qty }}</td>
                                            <td>
                                                {{-- <div>
                                                    <a href="/edit_barang_masuk/{{ $row->id }}" class="btn btn-primary">Edit</a>
                                                    <a href="/delete_barang_masuk/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                                                </div> --}}
                                                <form method="POST" action="{{ route('delete.stock', $row->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{ route('update.barang.masuk', $row->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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