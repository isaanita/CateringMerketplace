@extends('layouts.main')

@section('title', 'Invoices')

@section('content')
<div class="container">
    <h2>Invoices</h2>
    <ul>
        @foreach($invoices as $invoice)
            <li>
                Order ID: {{ $invoice->order_id }} - Total Price: {{ $invoice->total_harga }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
