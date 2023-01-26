@extends('admin.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> About </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/supplier"> Back</a>
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
                    <th>About</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($supplier as $s)

                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $s->nama}}</td>
                    <td>{{ $s->about}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
