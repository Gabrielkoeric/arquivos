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
        Schema::create('ip', function (Blueprint $table) {
            $table->id('id_ip')->autoIncrement();
            $table->string('ip');
            $table->string('cidade')->nullable();
            $table->string('regiao')->nullable();
            $table->string('continente')->nullable();
            $table->string('localizacao')->nullable();
            $table->string('empresa')->nullable();
            $table->string('postal')->nullable();
            $table->string('timezone')->nullable();
            $table->unsignedBigInteger('id_incidente')->nullable();
            $table->boolean('check')->defult('true')->nullable();
            $table->timestamps();

            $table->foreign('id_incidente')->references('id_incidente')->on('incidente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip');
    }
};
