<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\barang;
use App\Models\brgkeluar;
use App\Models\brgmasuk;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_barang = barang::count();
        $jumlah_user = User::count();
        $jumlah_masuk = brgmasuk::count();
        $jumlah_keluar = brgkeluar::count();
        return view('home', compact('jumlah_user','jumlah_barang','jumlah_masuk','jumlah_keluar'));

        // return view('home');
    }
}
