<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Barang Keluar</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>No Barang masuk</th>
    <th>Nama barang</th>
    <th>Kategori</th>
    <th>Tanggal</th>
    <th>Harga</th>
    <th>Jumlah</th>
  </tr>
  @php
    $no=1;
@endphp
  @foreach ($data as $row)
  <tr>
    <td>{{ $no++}}</td>
    <td>{{ $row->no_brgkeluar}}</td>
    <td>{{ $row->barang->nama_barang}}</td>
    <td>{{ $row->barang->kategori->nama_kategori}}</td>
    <td>{{ $row->date}}</td>
    <td>Rp. {{ number_format($row->barang->harga) }}</td>
    <td>{{ $row->jumlah_brgkeluar}} Unit</td>
  </tr>
@endforeach
<tr>
    <td colspan="6">Total</td>
    <td></td>
  </tr>

</table>

</body>
</html>


