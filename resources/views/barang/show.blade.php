@extends('admin.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Detail Barang </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/barang"> Back</a>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($barang as $s)

                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $s->nama_barang}}</td>
                    <td>{{ $s->detail}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
