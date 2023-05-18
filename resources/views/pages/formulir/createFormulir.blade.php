@extends('layouts.master')

@section('title')
    BFormulir Peminjaman Barang
@endsection

@section('sub-title')
    Input Formulir Peminjaman Barang
@endsection

@section('content')

    <form action="/formulir" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Tanggal Meminjam </label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" autofocus>
            <label for="nama">Tanggal Pengembalian </label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" >
            <input type="hidden" name="status" id="status" class="form-control" value="Menunggu Konfirmasi" >
            <input type="hidden" name="alasan" id="alasan" class="form-control" value="Belum Dikonfirmasi Admin" >
            @error('tanggal_pinjam')
                <span class="badge bg-danger text-white">
                    {{ $message }}
                </span>
            @enderror
            @error('tanggal_pengembalian')
                <span class="badge bg-danger text-white">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection