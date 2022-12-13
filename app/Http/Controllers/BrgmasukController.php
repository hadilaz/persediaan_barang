<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\kategori;
use App\Models\brgmasuk;
use PDF;

class BrgmasukController extends Controller
{

    public function index()
    {
        $brgmasuk = Brgmasuk::with('barang')->latest()->simplepaginate(10);

        $barang = Barang::all();

         return view('barangmasuk/brg_msk', compact('barang', 'brgmasuk'));

    }

    public function create()
    {
        $barang = Barang::all();

        return view('barangmasuk/add', compact('barang'));
    }

    // public function ajax(Request $request)
    // {

    //     $barang_id['barang_id'] = $request->barang_id;
    //     $ajax_barang            = Barang::where('id', $barang_id)->get();

    //     return view('barangmasuk/ajax', compact('ajax_barang'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        brgmasuk::create([
            'no_brgmasuk' => $request->no_brgmasuk,
            'barang_id' => $request->barang_id,
            'nama_barang' => $request->nama_barang,
            'date' => $request->date,
            'jumlah_brgmasuk' => $request->jumlah_brgmasuk,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $barang = Barang::find($request->barang_id);

        $barang ->stok += $request->jumlah_brgmasuk;
        $barang ->save();

        return redirect('/brgmasuk')->with('success', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function exportpdf()
    {
        $data = brgmasuk::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('barangmasuk/databrgmasuk-pdf');
        return $pdf->download('data_brgmasuk.pdf');
    }
}
