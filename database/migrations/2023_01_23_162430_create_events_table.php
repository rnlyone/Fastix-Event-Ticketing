<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 190)->unique();
            $table->foreignId('id_eo')->constrained('users')->onDelete('cascade');
            $table->string('nama_event');
            $table->text('sinopsis');
            $table->text('deskripsi');
            $table->text('lokasi');
            $table->integer('max_buy');
            $table->dateTime('buka_regis');
            $table->dateTime('tutup_regis');
            $table->dateTime('mulai_event');
            $table->dateTime('selesai_event');
            $table->string('img_url');
            $table->boolean('visibility');
            $table->boolean('soft_delete');
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
        Schema::dropIfExists('events');
    }
};
