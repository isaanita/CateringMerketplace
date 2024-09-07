@extends('layouts.main')

@section('title', 'Orders')

@section('content')
<div class="container">
    <h2>Orders</h2>
    <ul>
        @foreach($orders as $order)
            <li>
                Menu: {{ $order->menu->nama }} - Quantity: {{ $order->jumlah }} - Delivery Date: {{ $order->tanggal_pengiriman }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
