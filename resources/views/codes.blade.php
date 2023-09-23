@extends('templates/default')


@section('content')
<!-- Page Heading -->
<div class="page-heading d-flex justify-content-between mx-4 mb-2">
    <h1 class="h3 mb-2 text-gray-800">Stok Barang</h1>
</div>
@if (session('success'))
<div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4 border-top-primary">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="font-weight-bold text-primary mt-2 ml-2">Data Stok Barang</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <form action="{{route('stock')}}" method="GET" class="d-sm-inline-block form-inline">
                @csrf
                <div class="d-inline-block">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="form-control mr-3" placeholder="ABC000" value="{{ request('kode_barang') }}" required/>
                </div>
                <div class="d-inline-block">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control mr-3" placeholder="ASUS" value="{{ request('nama_barang') }}"/>
                </div>
                <div class="d-inline-block">
                    <label>Kategori</label>
                    <select name="nama_kategori" class="form-control mr-3">
                        <option selected disabled>Kategori</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_kategori }} </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </form> 
            <div class="mt-4">
                <a class="btn btn-danger" href="{{ route('export.pdf') }}" >Export PDF <i
                    class="fas fa-download fa-sm ml-1"></i></a>
              <a class="btn btn-success" href="new_stock">+ Tambah</a>
          </div>
      </div>

        <div class="table-responsive ">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>@sortablelink('kode_barang', 'Kode Barang')</th>
                        <th>@sortablelink('nama_barang', 'Nama')</th>
                        <th>@sortablelink('categories_id', 'Kategori')</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1 + (($data->currentPage()-1) * $data->perPage());
                    @endphp
                    @foreach ($data as $kode)
                    <tr>
                        <td class="number">{{ $no++ }}.</td>
                        <td class="text-uppercase">{{ $kode->kode_barang }}</td>
                        <td class="text-capitalize">{{ $kode->nama_barang }}</td>
                        <td class="text-capitalize">{{ $kode->categories->nama_kategori}}</td>
                        <td class="text-capitalize">{{ $kode->jumlah_barang }}</td>
                        <td>
                            {{-- <div>
                                <a href="/edit_kode_barang/{{ $kode->id }}" class="btn btn-primary">Edit</a>
                                <a href="/delete_kode_barang/{{ $kode->id }}" class="btn btn-danger">Hapus</a>
                            </div> --}}
                            <form method="POST" action="{{ route('delete.stock', $kode->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <a href="{{ route('update.stock', $kode->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
