@extends('templates/default')

@section('content')
<!-- Page Heading -->
<div class="page-heading d-flex justify-content-between mx-4 mb-2">
    <h1 class="h3 mb-2 text-gray-800">Kategori Barang</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-top-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <form action="{{route('add.kategori')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input name="nama_kategori" type="text"
                        class="form-control @error('nama_kategori') is-invalid @enderror" id="nama" placeholder="Laptop"
                        value="{{ old('nama_kategori') }}">
                    @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mx-2">
                    <a class="btn btn-info" href="{{ route('categories') }}"> Kembali </a>
                    <button class="btn btn-success" type="submit">+ Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
