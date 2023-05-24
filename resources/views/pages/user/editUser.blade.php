@extends('layouts.master')

@section('title')
    Management User
@endsection

@section('sub-title')
    Edit User
@endsection

@section('content')


<form action="/user/{{$user->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="user">Edit Data User</label>

        <label for="name">Nama User </label>
        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        @error('name')
            <span class="badge bg-danger text-white">
        @enderror
        <label for="email">Email User</label>
        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
        @error('email')
            <span class="badge bg-danger text-white">
                {{ $message }}
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
  
@endsection