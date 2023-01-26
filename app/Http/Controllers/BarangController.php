<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\models\kategori;
use PDF;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $barang = Barang::with('kategori')->latest()->simplepaginate(10);

       $kategori = Kategori::all();

        return view('Barang/index', compact('barang', 'kategori'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'merek' => $request->merek,
            'stok' => $request->stok,
            'detail' => $request->detail,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);
        return redirect('/barang')->with('success', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $barang = barang::all();

        return view('Barang/show', compact('barang'));

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
        $barang = Barang::find($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_id = $request->kategori_id;
        $barang->harga       = $request->harga;
        $barang->merek       = $request->merek;
        $barang->stok        = $request->stok;
        $barang->updated_at  = date('Y-m-d H:i:s');

        $barang->save();

        return redirect('/barang')->with('success', 'data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $barang = Barang::find($id);
        // $barang->delete();

        Barang::whereId($id)->delete();
        return redirect('/barang')->with('success', 'data berhasil dihapus');
    }

    public function exportpdf()
    {
        $data = Barang::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('barang/databarang-pdf');
        return $pdf->download('data.pdf');
    }
}
