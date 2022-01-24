<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ormas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi')->nullable();
            $table->string('bidang')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tempat_dan_waktu')->nullable();
            $table->string('asas')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('keputusan')->nullable();
            $table->string('unit')->nullable();
            $table->string('usaha')->nullable();
            $table->string('sumber_keuangan')->nullable();
            $table->string('program')->nullable();
            $table->string('email')->nullable();
            $table->string('pendiri')->nullable();
            $table->string('pembina')->nullable();
            $table->string('penasehat')->nullable();
            $table->string('ketua')->nullable();
            $table->string('sekretaris')->nullable();
            $table->string('bendahara')->nullable();
            $table->string('nik_ketua')->nullable();
            $table->string('nik_sekretaris')->nullable();
            $table->string('nik_bendahara')->nullable();
            $table->string('masa_bakti')->nullable();
            $table->string('nama_notaris')->nullable();
            $table->string('nomor_tgl_notaris')->nullable();
            $table->string('nomor_tgl_permohonan')->nullable();
            $table->string('npwp')->nullable();
            $table->string('lambang')->nullable();
            $table->string('bendera')->nullable();

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
        Schema::dropIfExists('ormas');
    }
}
