@extends('layouts.master')

@section('title')
    Pinjam Barang Kantor 
@endsection

@section('sub-title')
    Input Pinjam Barang Kantor
@endsection

@section('content')

    <form action="/pinjambarang" method="POST">
        @csrf
        <div class="form-group">
            <select type="text" class="form-control" name="barang_id" id="barang_id">
                <option value="" selected>-- Pilih Barang --</option>
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
            <input type="number" name="jumlah" id="jumlah" class="form-control" >
            @error('jumlah')
                <span class="badge bg-danger text-white">
                    {{ $message }}
                </span>
            @enderror
            <input type="hidden" name="formulir_id" id="formulir_id" class="form-control" value="{{$formulir_id}}" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection