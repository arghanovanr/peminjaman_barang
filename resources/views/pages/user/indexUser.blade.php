@extends('layouts.master')

@section('title')
    Management User
@endsection

@section('sub-title')
    Index User
@endsection

@section('content')
<a href="/register" class="btn btn-success btn-sm mb-4">Input</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nama</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $datausers)
        <tr>
            <td>{{$datausers->id}}</td>
            <td>{{$datausers->name}}</td>
            <td>{{$datausers->role}}</td>
            <td>{{$datausers->email}}</td>
            <td>
              <form action="/user/{{$datausers->id}}" method="POST">
                @csrf
                @method('delete')
                <a href="/user/{{$datausers->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/userpass/{{$datausers->id}}/reset" class="btn btn-success btn-sm">Reset</a>
                <input type="submit" value="delete" class="btn btn-danger btn-sm">
              </form>  

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
@endsection