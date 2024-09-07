@extends('layouts.main')

@section('title', 'Merchant Dashboard')

@section('content')
<div class="container">
    <h2>Merchant Dashboard</h2>
    <h3>Profile</h3>
    <form method="POST" action="{{ route('merchants.updateProfile') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="{{ $merchant->nama_perusahaan }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $merchant->alamat }}" required>
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" class="form-control" name="kontak" id="kontak" value="{{ $merchant->kontak }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $merchant->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

    <h3>Manage Menus</h3>
    <a href="{{ route('merchants.manageMenus') }}" class="btn btn-primary">Manage Menus</a>

    <h3>Orders</h3>
    <a href="{{ route('merchants.viewOrders') }}" class="btn btn-primary">View Orders</a>
</div>
@endsection
