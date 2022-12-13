@extends('admin.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah barang keluar</h1>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <form method="POST" enctype="multipart/form-data" action="/brgkeluar/store">
        @csrf

    <div class="card-body">

        <input type="hidden" value="{{ Auth::user()->id }}"  name="user_id" required>

        <div class="form-group">
            <label>No Barang Masuk</label>
            <input type="text" class="form-control" placeholder=".....No barang masuk....." name="no_brgkeluar" required>

        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <select class="form-control" name="barang_id" id="barang_id" required>
                <option value="" hidden="">.......pilih barang.......</option>

                @foreach ($barang as $d )
                    <option value="{{ $d->id }}">{{ $d->nama_barang }}</option>
                @endforeach
            </select>
        </div>

       <div id="detail_barang"></div>

       <div class="form-group">
        <label for="date">Tanggal</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>

        {{-- @foreach ($barang as $d )
        <div class="form-group">
            <label>Harga</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                </div>
                     <input type="text" class="form-control" id="harga" value="{{ $d->harga }}" readonly required>
            </div>
        </div>
        @endforeach --}}

        <div class="form-group">
            <label>Jumlah Barang</label>
            <div class="input-group mb-3">

            <input type="number" class="form-control" placeholder="........Jumlah barang....." id="jumlah_brgkeluar" name="jumlah_brgkeluar" required>

                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Unit</span>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/brgkeluar" class="btn btn-secondary btn-sm">Kembali</a>
         </form>
    </div>





    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}


    {{-- <script type="text/javascript">
                $(document).ready(function(){

                    $("#jumlah_brgmasuk").keyup(function(){
                        var jumlah_brgmasuk = $("#jumlah_brgmasuk").val();
                        var harga           = $("#harga").val();

                        var total = parseInt(harga) * parseInt(jumlah_brgmasuk);
                        $("#total").val(total);
                    });
                });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script> --}}

    {{-- <script type="text/javascript">
        $("#barang_id").change(function(){
            var barang_id = $("#barang_id").val();
            $.ajax({
                type:"GET",
                url:"/brgmasuk/ajax",
                data:"barang_id="+barang_id,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                }
            });
        });
    </script> --}}


@endsection
