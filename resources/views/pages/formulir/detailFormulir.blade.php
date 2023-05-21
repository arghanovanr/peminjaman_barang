@extends('layouts.master')

@section('title')
    Detail Formulir
@endsection

@section('sub-title')
    Formulir Peminjaman
@endsection

@section('content')


    <div class="form-group">'
            <label for="kode">Tanggal Meminjam </label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{$formulir->tanggal_pinjam}}" disabled>
            <label for="nama">Tanggal Pengembalian </label>
            <input type="text" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" value="{{$formulir->tanggal_pengembalian}}" disabled>
            <label for="nama">Status </label>
            <input type="text" name="status" id="status" class="form-control" value="{{$formulir->status}}" disabled> 
            <br>
            <label for="label">List Barang yang dipinjam </label>  
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama Barang </th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pinjambarang as $datapinjambarang)
                    <tr>
                        <td>{{$datapinjambarang->id}}</td>
                        <td>{{$datapinjambarang->barang->nama}}</td>
                        <td>{{$datapinjambarang->jumlah}}</td>
                        <td>
                          <form action="/pinjambarang/{{$datapinjambarang->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/formulir/{{$datapinjambarang->id}}/edit" class="btn btn-info btn-sm">Detail</a>
                            <input type="submit" value="delete" class="btn btn-danger btn-sm">
                          </form>  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
    </div>

    <a href="/pinjambarang/{{$formulir->id}}/input" class="btn btn-primary btn-sm">Tambah Barang</a>
    <br>

    <hr>
    <a href="/formulir/{{$formulir->id}}/edit" class="btn btn-primary btn-sm">Edit</a>


@endsection