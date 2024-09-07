<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('merchants.index');
            dd('a');
        }
    }

    public function showRegisterForm()
    {
        return view('register.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'user_type' => 'required|in:customer,merchant',
            'name' => 'required_if:user_type,customer|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'nama_perusahaan' => 'required_if:user_type,merchant|max:255',
            'alamat' => 'required_if:user_type,merchant|max:255',
            'kontak' => 'required_if:user_type,merchant|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Buat User baru
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Tentukan group_id
        if ($request->user_type == 'customer') {
            $user->name = $request->name;
            $user->group_id = 1; // Customer
        } else {
            $user->name = $request->nama_perusahaan; // Nama perusahaan disimpan di kolom name
            $user->group_id = 2; // Merchant
        }

        $user->save();

        // Jika Merchant, simpan detail merchant
        if ($request->user_type == 'merchant') {
            Merchant::create([
                'user_uuid' => $user->uuid, // UUID dari user yang baru dibuat
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
