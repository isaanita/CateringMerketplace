@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="user_type">Register as:</label><br>
                <input type="radio" id="customer" name="user_type" value="customer" required>
                <label for="customer">Customer</label><br>
                <input type="radio" id="merchant" name="user_type" value="merchant" required>
                <label for="merchant">Merchant</label>
            </div>

            <!-- Field tambahan untuk Merchant -->
            <div id="merchant-fields" style="display: none;">
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                </div>

                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" class="form-control" name="kontak" id="kontak" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Perusahaan</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                </div>
            </div>

            <!-- Field untuk Customer -->
            <div id="customer-fields">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let customerRadio = document.getElementById('customer');
            let merchantRadio = document.getElementById('merchant');
            let merchantFields = document.getElementById('merchant-fields');
            let customerFields = document.getElementById('customer-fields');
            let nameField = document.getElementById('name'); // Field 'name' untuk customer
            let namaPerusahaanField = document.getElementById('nama_perusahaan'); // Field 'nama_perusahaan' untuk merchant
    
            customerRadio.addEventListener('change', function() {
                merchantFields.style.display = 'none';
                customerFields.style.display = 'block';
                nameField.setAttribute('required', 'true'); // Tambahkan 'required' pada name
                namaPerusahaanField.removeAttribute('required'); // Hapus 'required' pada nama_perusahaan
            });
    
            merchantRadio.addEventListener('change', function() {
                merchantFields.style.display = 'block';
                customerFields.style.display = 'none';
                nameField.removeAttribute('required'); // Hapus 'required' pada name
                namaPerusahaanField.setAttribute('required', 'true'); // Tambahkan 'required' pada nama_perusahaan
            });
        });
    </script>
    
@endsection


{{-- @extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="user_type">Register as:</label><br>
                <input type="radio" id="customer" name="user_type" value="customer" required>
                <label for="customer">Customer</label><br>
                <input type="radio" id="merchant" name="user_type" value="merchant" required>
                <label for="merchant">Merchant</label>
            </div>

            <!-- Field tambahan untuk Merchant -->
            <div id="merchant-fields" style="display: none;">
                <div class="form-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat">
                </div>

                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" class="form-control" name="kontak" id="kontak">
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Perusahaan</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                </div>
            </div>

            <div id="customer-fields">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        // Tampilkan field tambahan jika tipe user adalah merchant
        document.addEventListener('DOMContentLoaded', function() {
            let customerRadio = document.getElementById('customer');
            let merchantRadio = document.getElementById('merchant');
            let merchantFields = document.getElementById('merchant-fields');
            let customerFields = document.getElementById('customer-fields');

            customerRadio.addEventListener('change', function() {
                merchantFields.style.display = 'none';
                customerFields.style.display = 'block';
            });

            merchantRadio.addEventListener('change', function() {
                merchantFields.style.display = 'block';
                customerFields.style.display = 'none';
            });
        });
    </script>
@endsection --}}
