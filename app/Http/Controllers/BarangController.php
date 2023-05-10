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

     // Menampilkan halaman input ruang
     public function create()
     {
         return view('pages.barang.createBarang');
     }
 
     // Melakukan proses input ruang
     public function store(Request $request)
     {
         // Validasi data
         $request->validate([
             'kode' => 'required',
             'nama' => 'required',
         ]);
 
         //Input data ruang ke database
         Barang::create([
             'kode' => $request->kode,
             'nama' => $request->nama,
         ]);
 
         // Kembali ke halaman ruang rapat
         return redirect('/barang');
     }
 
     // Menampilkan halaman edit ruang
     public function edit($id)
     {
 
         // Mencari data ruang sesuai id
         $Barang = Barang::find($id);
         return view('pages.barang.editBarang', ['barang' => $Barang]);
     }
 
     public function update($id, Request $request)
     {
         // Validasi data
         $request->validate([
             'nama' => 'required',
         ]);
 
         // Update data
         $Barang = Barang::find($id);
         $Barang->nama = $request->nama;
         $Barang->save();
 
         // Kembali ke halaman ruang rapat
         return redirect('/barang');
     }
 
     public function destroy($id)
     {
         // Delete spesific data
         $Barang = Barang::find($id);
         $Barang->delete();
 
         // Kembali ke halaman ruang rapat
         return redirect('/barang');
     }
}
