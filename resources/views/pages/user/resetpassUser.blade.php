@extends('layouts.master')

@section('title')
    Management User
@endsection

@section('sub-title')
    Index User
@endsection

@section('content')

<form action="/userpass/{{$user->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="user">Reset Password User</label>

        <label for="name">Nama User </label>
        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" disabled>
       
        <label for="email">Email User</label>
        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" disabled>
        
        <label for="password">Password Baru </label>
        <input type="password" name="password" id="password"  class="form-control @error('password') is-invalid @enderror" >
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                
        <label for="confirm_password">Confirm Password Baru </label>
        <input type="password" name="confirm_password" id="confirm_password"  class="form-control @error('confirm_password') is-invalid @enderror" >
        @error('confirm_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Reset Password</button>
</form>
  
@endsection