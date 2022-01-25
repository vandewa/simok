<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ormas')->nullable();
            $table->string('lambang')->nullable();
            $table->string('bendera')->nullable();
            $table->string('img_surat_pemberitahuan')->nullable();
            $table->string('img_sk_kemenkumham')->nullable();
            $table->string('img_akte')->nullable();
            $table->string('img_program')->nullable();
            $table->string('img_sk_pengurus')->nullable();
            $table->string('img_biodata')->nullable();
            $table->string('img_foto_pengurus')->nullable();
            $table->string('img_ktp_pengurus')->nullable();
            $table->string('img_domisili')->nullable();
            $table->string('img_gedung')->nullable();
            $table->string('img_sk_tdk_berafiliasi')->nullable();
            $table->string('img_sk_tdk_konflik')->nullable();
            $table->string('img_npwp')->nullable();
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
        Schema::dropIfExists('files');
    }
}
