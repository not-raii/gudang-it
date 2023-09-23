<!DOCTYPE html>
<html>
<head>
<style>
#customers {
    font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  border-collapse: collapse;
  width: 75%;
  text-align: center;
  margin: 0 auto;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  text-align: center;

}

h1 {
  font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  text-align: center
}

</style>
</head>
<body>

<h1>Data Stok Barang</h1>

<table id="customers">
    <thead>
        <tr>
          <th>No.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Stock</th>
        </tr>
    </thead>
  <tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($data as $kode)    
    <tr>
        <td class="number">{{ $no++ }}.</td>
        <td class="text-uppercase">{{ $kode->kode_barang }}</td>
        <td class="text-capitalize">{{ $kode->nama_barang }}</td>
        <td class="text-capitalize">{{ $kode->categories->nama_kategori}}</td>
        <td class="text-capitalize">{{ $kode->jumlah_barang }}</td>
    </tr>
    @endforeach
    
</tbody>
</table>

</body>
</html>
