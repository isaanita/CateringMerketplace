@extends('layouts.main')

@section('title', 'Manage Menus')

@section('content')
<div class="container">
    <h2>Manage Menus</h2>
    <form method="POST" action="{{ route('merchants.storeMenu') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Menu</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" step="0.01" class="form-control" name="harga" id="harga" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto Menu</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        <button type="submit" class="btn btn-primary">Add Menu</button>
    </form>

    <h3>Existing Menus</h3>
    <ul>
        @foreach($menus as $menu)
            <li>
                {{ $menu->nama }} - {{ $menu->harga }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
