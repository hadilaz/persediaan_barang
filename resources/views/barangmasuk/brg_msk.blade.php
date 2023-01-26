@extends('admin.app')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Barang Masuk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Barang Masuk</h4>
                    <a class="btn btn-primary btn-round ml-auto" href="/brgmasuk/create">
                        <i class="fa fa-plus"></i>
                        Add Barang masuk
                    </a>
                    <a href="/exportpdfmasuk" class="btn btn-info btn"><i class="fas fa-plus"></i> Export pdf</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Barang masuk</th>
                                <th>Nama barang</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Harga Unit</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($brgmasuk as $row)
                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $row->no_brgmasuk}}</td>
                                <td>{{ $row->barang->nama_barang}}</td>
                                <td>{{ $row->barang->kategori->nama_kategori}}</td>
                                <td>{{ $row->date}}</td>
                                <td>Rp. {{ number_format($row->barang->harga) }}</td>
                                <td>{{ $row->jumlah_brgmasuk}} Unit</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</main>

@endsection
