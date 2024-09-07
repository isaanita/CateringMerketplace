<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function index()
    {
        $merchant = Auth::user()->merchant;
        $menus = Menu::where('merchant_uuid', $merchant->user_uuid)->get();
        return view('merchant.index', compact('merchant', 'menus'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kontak' => 'required|max:255',
            'deskripsi' => 'nullable'
        ]);

        $merchant = Auth::user()->merchant;
        $merchant->update($request->only('nama_perusahaan', 'alamat', 'kontak', 'deskripsi'));
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function manageMenus()
    {
        $merchant = Auth::user()->merchant;
        $menus = Menu::where('merchant_uuid', $merchant->user_uuid)->get();
        return view('merchant.manage_menus', compact('menus'));
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image',
        ]);

        $merchant = Auth::user()->merchant;
        $menu = new Menu($request->only('nama', 'deskripsi', 'harga'));
        if ($request->hasFile('foto')) {
            $menu->foto = $request->file('foto')->store('menu_images');
        }
        $menu->merchant_uuid = $merchant->user_uuid;
        $menu->save();

        return redirect()->back()->with('success', 'Menu added successfully!');
    }

    public function viewOrders()
    {
        $merchant = Auth::user()->merchant;
        $orders = $merchant->orders()->with('menu')->get();
        return view('merchant.orders', compact('orders'));
    }
}
