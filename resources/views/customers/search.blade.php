@extends('layouts.main')

@section('title', 'Search Caterings')

@section('content')
<div class="container">
    <h2>Search Caterings</h2>
    <form method="GET" action="{{ route('customers.searchCaterings') }}">
        <div class="form-group">
            <input type="text" class="form-control" name="query" placeholder="Search for menus..." required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <h3>Results</h3>
    <ul>
        @foreach($menus as $menu)
            <li>
                {{ $menu->nama }} - {{ $menu->harga }}
                <form method="POST" action="{{ route('customers.order') }}" style="display:inline;">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <input type="number" name="jumlah" placeholder="Quantity" required>
                    <input type="date" name="tanggal_pengiriman" required>
                    <button type="submit" class="btn btn-primary">Order</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
