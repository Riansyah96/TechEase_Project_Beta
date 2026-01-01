<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Jika menggunakan ENUM, kita harus mendaftarkan ulang semua opsi
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status')->default('pending')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders_status', function (Blueprint $table) {
            //
        });
    }
};
