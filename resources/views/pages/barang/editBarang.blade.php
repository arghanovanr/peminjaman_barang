@extends('layouts.master')

@section('title')
    Barang Kantor
@endsection

@section('sub-title')
    Edit Barang Kantor
@endsection

@section('content')

<form action="/barang/{{$barang->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">'
        <label for="kode">Kode Barang </label>
        <input type="text" name="kode" id="kode" class="form-control" value="{{$barang->kode}}" autofocus>
        <label for="nama">Nama Barang </label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{$barang->nama}}" >
        @error('nama')
            <span class="badge bg-danger text-white">
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection