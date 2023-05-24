@extends('layouts.master')

@section('title')
    Barang Kantor
@endsection

@section('sub-title')
    Edit Barang Kantor
@endsection

@section('content')

<form action="/pinjambarang/{{$pinjambarang->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <select type="text" class="form-control" name="barang_id" id="barang_id">
            <option value="{{$pinjambarang->barang_id}}" selected>{{$pinjambarang->barang->nama}}</option>
            @forelse ($barang as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @empty
                <option value="">Data Barang Kosong</option>
            @endforelse
        </select>
        @error('barang')
            <span class="badge bg-danger text-white">
                {{ $message }}
            </span>
        @enderror
        <label for="nama">Jumlah Barang </label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{$pinjambarang->jumlah}}" >
        @error('jumlah')
            <span class="badge bg-danger text-white">
                {{ $message }}
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection