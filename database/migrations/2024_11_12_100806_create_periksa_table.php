<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriksaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('dokters')->onDelete('cascade');
            $table->date('tgl_periksa');
            $table->text('catatan')->nullable();
            $table->text('obat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('periksa');
    }
}
