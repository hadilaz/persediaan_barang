@extends('admin.app')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Supplier Barang</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Supplier</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddsupplier">
                        <i class="fa fa-plus"></i>
                        Add Supplier
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telephone</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($supplier as $row)

                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $row->nama}}</td>
                                <td>{{ $row->telepone}}</td>
                                <td>{{ $row->alamat}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info btn-xs" href="/supplier/show">About</a>
                                    <a href="#modalEditsupplier{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                    <form action="/supplier/{{ $row->id }}" method="post">
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


    <div class="modal fade" id="modalAddsupplier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/supplier/store">

                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control"  name="nama" placeholder=".......Nama supplier ....." required>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="number" class="form-control"  name="telepone" placeholder=".......telephone....." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control"  name="alamat" placeholder=".......Alamat....." required>
                    </div>
                    <div class="form-group">
                        <label>About</label>
                        <input type="text" class="form-control"  name="about" placeholder=".......About...." required>
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

    @foreach ($supplier as $d )

    <div class="modal fade" id="modalEditsupplier{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">edit supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/supplier/{{ $d->id }}/update">
                @csrf

                <div class="modal-body">
                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" value="{{ $d->nama }}" class="form-control" name="nama" placeholder=".......Nama....." required>
                    </div>
                    <div class="form-group">
                        <label>telephone</label>
                        <input type="number" value="{{ $d->telepone }}" class="form-control" name="telepone" placeholder=".......telephone...." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" value="{{ $d->alamat }}" class="form-control" name="alamat" placeholder=".......alamat...." required>
                    </div>
                    <div class="form-group">
                        <label>About</label>
                        <input type="text" value="{{ $d->about }}" class="form-control" name="about" placeholder=".......about..." required>
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

    {{-- @foreach ($kategori as $g )

    <div class="modal fade" id="modalHapuskategori{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/kategori/{{ $d->id }}/destroy">
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
