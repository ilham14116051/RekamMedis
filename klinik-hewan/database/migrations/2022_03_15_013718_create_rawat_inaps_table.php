<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medis_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pasien_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_ranap');
            $table->date('tgl_ranap');
            $table->integer('total_item');
            $table->integer('grand_total');
            $table->integer('total_diskon');
            $table->integer('total_invoice_ranap');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('rawat_inaps');
    }
}
