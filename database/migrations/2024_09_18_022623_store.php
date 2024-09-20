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
        Schema::dropIfExists('item_transactions');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('promo_items');
        Schema::dropIfExists('items');
        Schema::dropIfExists('users');
        
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_user')->primary()->autoincrement();
            $table->string('email', 75)->unique();
            $table->string('nama_user', 50);
            $table->string('password', 255);
            $table->string('no_telp', 14)->nullable();
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->char('id_item', 16)->primary();
            $table->string('nama_item', 100);
            $table->integer('stock_item');
            $table->float('harga_item', 8, 2);
            $table->string('image', 100);
            $table->timestamps();
        });

        Schema::create('promo_items', function (Blueprint $table) {
            $table->integer('id_promo')->primary();
            $table->boolean('aktif');
            $table->integer('mn_beli');
            $table->integer('diskon')->nullable();
            $table->integer('gratis_item')->nullable();
            $table->char('id_item', 16);
            $table->foreign('id_item')->references('id_item')->on('items');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('id_transaction')->primary()->autoIncrement();
            $table->float('total_harga', 8, 2);
            $table->dateTime('tgl_transaksi');
            $table->boolean('paid');
            $table->integer('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->timestamps();
        });

        Schema::create('items_transactions', function (Blueprint $table) {
            $table->integer('id_transaction');
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions');
            $table->char('id_item', 16);
            $table->foreign('id_item')->references('id_item')->on('items');
            $table->integer('kuantitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_transactions');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('promo_items');
        Schema::dropIfExists('items');
        Schema::dropIfExists('users');
    }
};