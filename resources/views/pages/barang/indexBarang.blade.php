@extends('layouts.master')

@section('title')
    Barang Kantor
@endsection

@section('sub-title')
    Index Barang Kantor
@endsection

@section('content')

<a href="/barang/input" class="btn btn-primary btn-sm">Input</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Kode Barang </th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($barang as $databarang)
        <tr>
            <td>{{$databarang->id}}</td>
            <td>{{$databarang->kode}}</td>
            <td>{{$databarang->nama}}</td>
            <td>
              <form action="/barang/{{$databarang->id}}" method="POST">
                @csrf
                @method('delete')
                <a href="/barang/{{$databarang->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <input type="submit" value="delete" class="btn btn-danger btn-sm">
              </form>  

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection