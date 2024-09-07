{{-- @extends('layouts.app')

@section('content')
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    
    <form action="{{ route('merchant.updateProfile') }}" method="POST">
        @csrf
        <!-- Form Fields for Merchant Profile -->
        <button type="submit">Update Profile</button>
    </form>

    <h2>Manage Menus</h2>
    <form action="{{ route('merchant.manageMenus') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Form Fields for Menu -->
        <button type="submit">Add Menu</button>
    </form>

    <h2>Order List</h2>
    <ul>
        @foreach ($orders as $order)
            <li>{{ $order->menu->nama }} - {{ $order->jumlah }} - {{ $order->tanggal_pengiriman }}</li>
        @endforeach
    </ul>
@endsection --}}
