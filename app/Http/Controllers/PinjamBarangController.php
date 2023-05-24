<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamBarang;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class PinjamBarangController extends Controller
{
    // Menampilkan halaman input pinjambarang
    public function create($id)
    {
        $Barang = Barang::all();
        $formulir_id = $id;
        return view('pages.pinjambarang.createPinjamBarang', ['barang' => $Barang, 'formulir_id' => $formulir_id]);
    }

    // Melakukan proses input pinjambarang
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
        ]);
        //Input data ruang ke database
        PinjamBarang::create([
            'formulir_id' => $request->formulir_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
        ]);

        // Kembali ke halaman pinjambarang
        return redirect('/formulir/' . $request->formulir_id . '/detail');
    }

    // Menampilkan halaman edit pinjambarang
    public function edit($id)
    {

        // Mencari data pinjambarang sesuai id
        $PinjamBarang = PinjamBarang::find($id);
        $Barang = Barang::all();
        return view('pages.pinjambarang.editPinjamBarang', ['barang' => $Barang, 'pinjambarang' => $PinjamBarang]);
    }

    public function update($id, Request $request)
    {
        // Validasi data
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
        ]);

        // Update data
        $PinjamBarang = PinjamBarang::find($id);
        $PinjamBarang->barang_id = $request->barang_id;
        $PinjamBarang->jumlah = $request->jumlah;
        $PinjamBarang->save();

        // Kembali ke halaman pinjambarang
        return redirect('/formulir/' . $PinjamBarang->formulir_id . '/detail');
    }

    public function destroy($id)
    {
        // Delete spesific data
        $PinjamBarang = PinjamBarang::find($id);
        $PinjamBarang->delete();

        // Kembali ke halaman pinjambarang
        return redirect('/pinjambarang');
    }
}
