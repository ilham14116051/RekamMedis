<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inap_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rawat_inap_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('waktu');
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->integer('disc_amount');
            $table->integer('disc_percent');
            $table->integer('total_disc_line');
            $table->integer('total');
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
        Schema::dropIfExists('rawat_inap_details');
    }
}
