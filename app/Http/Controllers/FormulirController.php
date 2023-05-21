<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulir;
use App\Models\PinjamBarang;
use Illuminate\Support\Facades\Auth;

class FormulirController extends Controller
{
    public function index()
    {
        $Formulir = Formulir::all();
        return view('pages.formulir.indexFormulir', ['formulir' => $Formulir]);
    }

    // Menampilkan halaman input ruang
    public function create()
    {
        return view('pages.formulir.createFormulir');
    }

    // Melakukan proses input ruang
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_pengembalian' => 'required',
            'status' => 'required',
        ]);
        $id = Auth::user()->id;
        //Input data ruang ke database
        Formulir::create([
            'user_id' => $id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => $request->status,
            'alasan' => $request->alasan,
        ]);

        // Kembali ke halaman ruang rapat
        return redirect('/formulir');
    }

    // Menampilkan halaman detail sesuai id
    public function detail($id)
    {

        // Mencari data ruang sesuai id
        $Formulir = Formulir::find($id);

        // Menampilkan semua data Pinjam Barang sesuai ID Formulir
        $PinjamBarang = PinjamBarang::where('formulir_id', $id)->get();

        return view('pages.formulir.detailFormulir', ['formulir' => $Formulir, 'pinjambarang' => $PinjamBarang]);
    }

    // Menampilkan halaman edit ruang
    public function edit($id)
    {

        // Mencari data ruang sesuai id
        $Formulir = Formulir::find($id);
        return view('pages.formulir.editFormulir', ['formulir' => $Formulir]);
    }

    public function update($id, Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_pengembalian' => 'required',
            'status' => 'required',
        ]);

        // Update data
        $Formulir = Formulir::find($id);
        $Formulir->tanggal_pinjam = $request->tanggal_pinjam;
        $Formulir->tanggal_pengembalian = $request->tanggal_pengembalian;
        $Formulir->status = $request->status;
        $Formulir->alasan = $request->alasan;
        $Formulir->save();

        // Kembali ke halaman ruang rapat
        return redirect('/formulir');
    }

    public function destroy($id)
    {
        // Delete spesific data
        $Formulir = Formulir::find($id);
        $Formulir->delete();

        // Kembali ke halaman ruang rapat
        return redirect('/formulir');
    }
}
