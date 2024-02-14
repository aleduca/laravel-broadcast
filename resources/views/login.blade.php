@extends('layout')

@section('content')
<h2>Login</h2>

<form action="{{ route('login.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control">
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary mt-2">Login</button>
</form>


@endsection
