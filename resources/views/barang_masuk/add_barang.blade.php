@extends('templates/default')

@section('content')
<!-- Page Heading -->
<div class="page-heading d-flex justify-content-between mx-4 mb-2">
    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-top-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Masuk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <form action="{{route('add.barang.masuk')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input name="nama_barang" id="namaBarang" type="text"
                        class="form-control @error('nama_barang') is-invalid @enderror">
                    <input type="text" id='listBarang' readonly>

                    {{-- <div id="listBarang"></div> --}}
                    @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input name="kode_barang" id="kodeBarang" type="text"
                        class="form-control @error('kode_barang') is-invalid @enderror">
                    @error('kode_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Barang</label>
                    <input name="kategori" id="kategori" type="text"
                        class="form-control @error('kategori') is-invalid @enderror">
                    @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <input name="tgl_masuk" type="date"
                        class="form-control @error('tgl_masuk') is-invalid @enderror" 
                        value="{{ old('tgl_masuk') }}">
                    @error('tgl_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qty">Jumlah Barang</label>
                    <input name="qty" type="text"
                        class="form-control @error('qty') is-invalid @enderror" 
                        value="{{ old('qty') }}">
                    @error('qty')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mx-2">
                    <a class="btn btn-info" href="{{ route('barang.masuk') }}"> Kembali </a>
                    <button class="btn btn-success" type="submit">+ Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
