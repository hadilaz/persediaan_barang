@extends('admin.app')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Barang</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Barang</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
                        <i class="fa fa-plus"></i>
                        Add Barang
                    </button>
                    <a href="/exportpdf" class="btn btn-info btn"><i class="fas fa-plus"></i> Export pdf</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga Unit</th>
                                <th>Merek</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($barang as $row)

                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $row->nama_barang}}</td>
                                <td>{{ $row->kategori->nama_kategori}}</td>
                                <td>Rp. {{ number_format($row->harga) }}</td>
                                <td>{{ $row->merek}}</td>
                                <td>{{ $row->stok}} Unit</td>
                                <td width="20%">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info btn-xs" href="/barang/show">Detail</a>
                                         <a href="#modalEditBarang{{$row->id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                         <form action="/barang/{{ $row->id }}" method="post">
                                            @method('DELETE')
                                              @csrf
                                             <button type="submit" class="btn btn-danger btn-sm-xs"><i class="fas fa-trash"></i>
                                            Hapus</button>
                                    </form>
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

    <div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/barang/store">

                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control"  name="nama_barang" placeholder="...." required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control"  name="kategori_id" required>
                            <option value="..." hidden="">.....</option>
                            @foreach ($kategori as $p )
                            <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control"  name="detail" placeholder="...." required>
                    </div>

                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" class="form-control"  name="merek" placeholder="...." required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addonl">Rp</span>
                            </div>

                            <input type="number" class="form-control" placeholder="..." name="harga" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group mb-3">

                            <input type="number" class="form-control" placeholder="....." name="stok" required>

                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Unit</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
                </div>

            </form>

            </div>
        </div>
    </div>

    @foreach ($barang as $d )

    <div class="modal fade" id="modalEditBarang{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/barang/{{ $d->id }}/update">
                @csrf

                <div class="modal-body">
                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" value="{{ $d->nama_barang }}" class="form-control"  name="nama_barang" placeholder="...." required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control"  name="kategori_id" required>
                            <option value="{{ $d->kategori_id }}">{{ $d->nama_kategori}}</option>
                            @foreach ($kategori as $p )
                            <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" value="{{ $d->detail }}" class="form-control"  name="detail" placeholder="...." required>
                    </div>

                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" value="{{ $d->merek }}" class="form-control"  name="merek" placeholder="...." required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addonl">Rp</span>
                            </div>

                            <input type="number" value="{{ $d->harga }}" class="form-control" placeholder="Harga ..." name="harga" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">

                            <input type="number" value="{{ $d->stok }}" class="form-control" placeholder="stok....." name="stok" required>

                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Unit</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
                </div>

            </form>

            </div>
        </div>
    </div>

    @endforeach

    {{-- @foreach ($barang as $g )

    <div class="modal fade" id="modalHapusBarang{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/barang/{{ $d->id }}/destroy">
                @csrf

                <div class="modal-body">
                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <h4>Apakah anda yakin ingin menghapus data ini </h4>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Hapus</button>
                </div>

            </form>

            </div>
        </div>
    </div>

    @endforeach --}}

</main>

@endsection
