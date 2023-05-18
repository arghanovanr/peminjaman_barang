@extends('layouts.master')

@section('title')
    Formulir Peminjaman Barang
@endsection

@section('sub-title')
    Index Formulir Peminjaman Barang
@endsection

@section('content')

<a href="/formulir/input" class="btn btn-primary btn-sm">Input</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Tanggal Meminjam </th>
        <th scope="col">Tanggal Pengembalian</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($formulir as $dataformulir)
        <tr>
            <td>{{$dataformulir->id}}</td>
            <td>{{$dataformulir->tanggal_pinjam}}</td>
            <td>{{$dataformulir->tanggal_pengembalian}}</td>
            <td>{{$dataformulir->status}}</td>
            <td>
              <form action="/formulir/{{$dataformulir->id}}" method="POST">
                @csrf
                @method('delete')
                <a href="/formulir/{{$dataformulir->id}}/detail" class="btn btn-info btn-sm">Detail</a>
                <input type="submit" value="delete" class="btn btn-danger btn-sm">
              </form>  

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection