<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\kategori;
use App\Models\brgkeluar;
use PDF;

class BrgkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brgkeluar = Brgkeluar::with('barang')->latest()->simplepaginate(10);

        $barang = Barang::all();

         return view('barangkeluar/brg_keluar', compact('barang', 'brgkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();

        return view('barangkeluar/add', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $barang = Barang::find($request->barang_id);

        if($barang->stok < $request->jumlah_brgkeluar)
        {
            return redirect('/brgkeluar/create')->with('warning', 'Jumlah Barang Melebihi Stok');

        }
        else{
            brgkeluar::create([
                'no_brgkeluar' => $request->no_brgkeluar,
                'barang_id' => $request->barang_id,
                'user_id' => $request->user_id,
                'nama_barang' => $request->nama_barang,
                'date' => $request->date,
                'jumlah_brgkeluar' => $request->jumlah_brgkeluar,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);

            $barang ->stok -= $request->jumlah_brgkeluar;
            $barang ->save();

            return redirect('/brgkeluar')->with('success', 'data berhasil di simpan');

        }


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
        $data = brgkeluar::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('barangkeluar/databrgkeluar-pdf');
        return $pdf->download('data_brgkeluar.pdf');
    }
}
