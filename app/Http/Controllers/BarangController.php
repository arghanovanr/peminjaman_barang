<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $Barang = Barang::all();
        return view('pages.barang.indexBarang',['barang' => $Barang]);
    }
}
