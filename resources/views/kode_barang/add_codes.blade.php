@extends('templates/default')

@section('content')
<!-- Page Heading -->
<div class="page-heading d-flex justify-content-between mx-4 mb-2">
    <h1 class="h3 mb-2 text-gray-800">Stok Barang</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-top-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Stok Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <form action="{{route('add.stock')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input name="kode_barang" type="text"
                        class="form-control @error('kode_barang') is-invalid @enderror" id="kode" placeholder="ABC01"
                        value="{{ old('kode_barang') }}">
                    @error('kode_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input name="nama_barang" type="text"
                        class="form-control @error('nama_barang') is-invalid @enderror" id="nama" placeholder="Kursi"
                        value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input name="jumlah_barang" type="text"
                        class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah" placeholder="0"
                        value="{{ old('jumlah_barang') }}">
                    @error('jumlah_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('categories_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                </div>
                <div class="d-flex justify-content-between mx-2">
                    <a class="btn btn-info" href="{{ route('stock') }}"> Kembali </a>
                    <button class="btn btn-success" type="submit">+ Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
