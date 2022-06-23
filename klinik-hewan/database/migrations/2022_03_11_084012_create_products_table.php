<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_product_id')->constrained();
            $table->foreignId('kelas_product_id')->constrained();
            $table->string('kd_product');
            $table->string('nm_product');
            $table->integer('purchase_price');
            $table->integer('sale_price');
            $table->integer('stock');
            $table->string('remarks')->nullable();
            // $table->foreignId('kategori_product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
