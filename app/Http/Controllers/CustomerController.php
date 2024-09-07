<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('customer.index', compact('menus'));
    }

    public function search(Request $request)
    {
        $query = Menu::query();

        if ($request->has('query')) {
            $query->where('nama', 'like', '%' . $request->query . '%');
        }

        $menus = $query->get();
        return view('customer.search', compact('menus'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pengiriman' => 'required|date',
        ]);

        $menu = Menu::find($request->menu_id);

        $order = new Order();
        $order->customer_id = Auth::id();
        $order->menu_id = $request->menu_id;
        $order->jumlah = $request->jumlah;
        $order->tanggal_pengiriman = $request->tanggal_pengiriman;
        $order->save();

        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->total_harga = $menu->harga * $request->jumlah;
        $invoice->save();

        return redirect()->route('customers.viewInvoices')->with('success', 'Order placed successfully.');
    }

    public function viewInvoices()
    {
        $invoices = Invoice::whereHas('order', function ($query) {
            $query->where('customer_id', Auth::id());
        })->get();
        return view('customers.invoice', compact('invoices'));
    }
}
