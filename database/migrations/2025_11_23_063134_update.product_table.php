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
        schema::table('produks', function (Blueprint $table) {
            $table->text('produk_deskripsi_short')->after('quantity')->nullable();
            $table->text('produk_deskripsi_long')->after('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('produk_deskripsi_short');
            $table->dropColumn('produk_deskripsi_long');
        });
    }
};
