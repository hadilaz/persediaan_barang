@extends('admin.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah barang masuk</h1>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <form method="POST" enctype="multipart/form-data" action="/brgmasuk/store">
        @csrf

    <div class="card-body">

        <div class="form-group">
            <label>no Barang Masuk</label>
            <input type="text" class="form-control" placeholder="no barang masuk....." name="no_brgmasuk" required>

        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <select class="form-control" name="barang_id" id="barang_id" required>
                <option value="" hidden="">pilih barang.......</option>

                @foreach ($barang as $d )
                    <option value="{{ $d->id }}">{{ $d->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_barang"></div>

        <div class="form-group">
            <label>Jumlah Barang</label>
            <div class="input-group mb-3">

            <input type="number" class="form-control" placeholder="Jumlah barang....." id="jumlah_brgmasuk" name="jumlah_brgmasuk" required>

                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Unit</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Total</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                </div>
                <input type="text" class="form-control" placeholder="total....." id="total" name="total" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/brgmasuk" class="btn btn-secondary btn-sm">Kembali</a>
         </form>
    </div>




    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

    <script type="text/javascript">
                $(document).ready(function() {
                    $("#jumlah_brgmasuk").keyup(function() {
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
        </script>

    <script type="text/javascript">
        $("#barang_id").change(function(){
            var barang_id = $("#barang_id").val();
            $.ajax({
                type  : "GET",
                url   : "/brgmasuk/ajax",
                data  : "barang_id="+barang_id,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                }
            });
        });
    </script>


@endsection
