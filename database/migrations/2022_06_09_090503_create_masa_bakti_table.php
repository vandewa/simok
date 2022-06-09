<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasaBaktiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masa_bakti', function (Blueprint $table) {
            $table->id();
            $table->string('id_ormas');
            $table->string('masa_bakti');
            $table->string('ketua');
            $table->string('nik_ketua');
            $table->string('sekretaris');
            $table->string('nik_sekretaris');
            $table->string('bendahara');
            $table->string('nik_bendahara');
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
        Schema::dropIfExists('masa_bakti');
    }
}
