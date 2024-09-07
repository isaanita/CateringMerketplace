@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        
        <div class="text-center" style="margin-top: 40px">
            <a href="{{ route('register') }}">Belum punya akun? Daftar Sekarang</a>
        </div>
    </form>
</div>
@endsection
