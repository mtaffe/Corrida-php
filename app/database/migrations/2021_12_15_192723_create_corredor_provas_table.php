<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorredorProvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corredor_provas', function (Blueprint $table) {
            $table->foreignId('corredor_id')->references('id')->on('corredores');
            $table->foreignId('prova_id')->references('id')->on('provas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corredor_provas');
    }
}
