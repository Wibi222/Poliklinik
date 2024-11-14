<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id(); // Automatically creates an integer primary key
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('no_hp', 50);
            $table->timestamps();
        });

        // Set the table engine to InnoDB
        DB::statement('ALTER TABLE pasiens ENGINE = InnoDB;');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
};
