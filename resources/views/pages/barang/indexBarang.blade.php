@extends('layouts.master')

@section('title')
    Barang Kantor
@endsection

@section('sub-title')
    Index Barang Kantor
@endsection

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Kode Barang </th>
        <th scope="col">Nama Barang</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($barang as $databarang)
        <tr>
            <td>{{$databarang->id}}</td>
            <td>{{$databarang->kode}}</td>
            <td>{{$databarang->nama}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection