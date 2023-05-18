@extends('layouts.master')

@section('title')
    Barang Kantor
@endsection

@section('sub-title')
    Edit Barang Kantor
@endsection

@section('content')

<form action="/formulir/{{$formulir->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">'
            <label for="kode">Tanggal Meminjam </label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{$formulir->tanggal_pinjam}}" autofocus>
            <label for="nama">Tanggal Pengembalian </label>
            <input type="text" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" value="{{$formulir->tanggal_pengembalian}}">
            <label for="nama">Status </label>
            <input type="text" name="status" id="status" class="form-control" value="{{$formulir->status}}" >
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
            @error('status')
            <span class="badge bg-danger text-white">
                {{ $message }}
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection