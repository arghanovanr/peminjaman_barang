@extends('layouts.master')

@section('title')
    Barang Kantor 
@endsection

@section('sub-title')
    Input Barang Kantor
@endsection

@section('content')

    <form action="/barang" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode Barang </label>
            <input type="text" name="kode" id="kode" class="form-control" autofocus>
            <label for="nama">Nama Barang </label>
            <input type="text" name="nama" id="nama" class="form-control" >
            @error('nama')
                <span class="badge bg-danger text-white">
                    {{ $message }}
                </span>
            @enderror
            @error('kode')
                <span class="badge bg-danger text-white">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection