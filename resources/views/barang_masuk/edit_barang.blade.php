@extends('templates/default')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- <title>GudangIT - {{ $title }}</title> --}}

    <!-- Icon-->
    <link rel="shortcut icon" href="{{ 'favicon.svg' }}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<!-- Page Heading -->
<div class="page-heading d-flex justify-content-between mx-4 mb-2">
    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-top-primary">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Barang Masuk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <form action="{{ route('update.barang.masuk', $barang->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="codes_id">Kode Barang</label>
                    <select name="codes_id" class="form-control  @error('codes_id') is-invalid @enderror">
                        <option value="">Pilih Code Barang</option>
                        @foreach ($codes as $item)
                        <option value="{{ $item->id }}" {{isset($barang) ? ($barang->codes_id == $item->id ? 'selected' : '') : ''}}>{{ $item->kode_barang }}</option>
                        @endforeach
                    </select>
                    @error('codes_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <input name="tgl_masuk" type="date"
                        class="form-control @error('tgl_masuk') is-invalid @enderror" 
                        value="{{ $barang->tgl_masuk}}">
                    @error('tgl_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qty">Jumlah Barang</label>
                    <input name="qty" type="text"
                        class="form-control @error('qty') is-invalid @enderror" 
                        value="{{ $barang->qty }}">
                    @error('qty')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mx-2">
                    {{-- <a class="btn btn-info" href="{{route('barang.masuk')}}"> Kembali </a>
                    <button class="btn btn-success" type="submit">Update</button> --}}
                    <form method="POST" action="{{ route('update.barang.masuk', $barang->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <a href="{{ route('barang.masuk') }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-success update" data-toggle="tooltip" title='Update'>Update</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<script src="{{ '/assets/vendor/jquery/jquery.min.js' }}"></script>
<script src="{{ '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ '/assets/vendor/jquery-easing/jquery.easing.min.js' }}"></script>


<!-- Custom scripts for all pages-->
<script src="{{ '/assets/js/script.js' }}"></script>

<!-- Page level plugins -->
<script src="{{ '/assets/vendor/chart.js/Chart.min.js' }}"></script>

<!-- Page level custom scripts -->
<script src="{{ '/assets/js/demo/chart-area-demo.js' }}"></script>
<script src="{{ '/assets/js/demo/chart-pie-demo.js' }}"></script>
<!-- /.container-fluid -->
@endsection
