<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePulangPaksasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulang_paksas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medis_id')->constrained();
            $table->date('tgl_pulang');
            $table->string('alasan_pulang');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('pulang_paksas');
    }
}
