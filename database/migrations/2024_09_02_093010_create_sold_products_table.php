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
        Schema::create('sold_products', function (Blueprint $table) {
            $table->id('id_sold_product');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id_product')->on('products');
            $table->integer('quantity');
            $table->dateTime('date_time', precision:0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_products');
    }
};
