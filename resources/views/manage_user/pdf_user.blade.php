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
  background-color: #224abe;
  color: white;
  text-align: center;

}

h1 {
  font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  text-align: center
}

</style>
</head>
<body>

<h1>Data Pengguna GudangIT</h1>

<table id="customers">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>                                            
        </tr>
    </thead>
  <tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($data as $user)    
    <tr>
        <td class="number">{{ $no++ }}.</td>
        <td class="text-capitalize">{{ $user->name }}</td>
        <td class="text-lowercase">{{ $user->email }}</td>
        <td class="text-capitalize">{{ $user->role->name }}</td>
    </tr>
    @endforeach
    
</tbody>
</table>

</body>
</html>
