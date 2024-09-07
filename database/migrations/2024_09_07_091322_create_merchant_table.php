<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->uuid('user_uuid')->primary(); // Menggunakan UUID dari tabel users
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('kontak');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchant');
    }
};
