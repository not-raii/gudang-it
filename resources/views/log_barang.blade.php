@extends('templates/default')


@section('content')
                    <!-- Page Heading -->
                    <div class="page-heading d-flex justify-content-between mx-4 mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 border-top-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Barang</h6>
                        </div>
                        <div class="card-body">

                            <div>
                                <a class="btn btn-danger" href="{{ route('export.pdf') }}" >Export PDF <i
                                    class="fas fa-download fa-sm ml-1"></i></a>
                            </div>
                            
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Awal</th>
                                            <th>Barang Masuk</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Barang Keluar</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Stok Akhir</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($barang as $row)    
                                    <tr>
                                        <td class="number">{{ $no++ }}.</td>
                                        <td class="text-capitalize">{{ $row->kode_barang}}</td>
                                        <td class="text-capitalize">{{ $row->nama_barang }}</td>
                                        <td class="text-capitalize">{{ $row->jumlah_barang }}</td>
                                        <td class="text-capitalize">{{$row->barangMasuk->implode('qty')}}</td>
                                        <td class="text-capitalize">{{ $row->barangMasuk->implode('tgl_masuk')}}</td>
                                        <td class="text-capitalize">{{$row->barangKeluar->implode('qty')}}</td>
                                        <td class="text-capitalize">{{ $row->barangKeluar->implode('tgl_keluar') }}</td>
                                        {{-- <td class="text-capitalize">{{ $row->stock_akhir }}</td> --}}
                                        <td>
                                            <div>
                                                {{-- <a href="/edit_barang_masuk/{{ $row->id }}" class="btn btn-primary">Edit</a>
                                                <a href="/delete_barang_masuk/{{ $row->id }}" class="btn btn-danger">Hapus</a> --}}
                                            </div>
                                        </td>
                                    </tr>
                 
                                    @endforeach
                                
                                        
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection