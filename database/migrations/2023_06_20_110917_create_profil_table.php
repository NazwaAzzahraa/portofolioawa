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
        Schema::create('profil', function (Blueprint $table) {
            // $table->id();
            $table->integer('nis');
            $table->string('nama',50);
            $table->enum('jk',['L','P']);
            $table->string('ttl');
            $table->text('alamat');
            $table->text('sekolah');
            $table->text('foto');
            $table->text('about');
            $table->primary('nis');
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
        Schema::dropIfExists('profil');
    }
};
