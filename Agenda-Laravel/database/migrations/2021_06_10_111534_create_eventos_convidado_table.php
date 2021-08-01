<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosConvidadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_convidado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_realizador');
            $table->enum('estado', ['Confirmado', 'Pendente', 'Cancelado'])->default('Pendente');
            $table->string('justificativa')->nullable();
            $table->foreign('id_evento')->references('id')->on('eventos');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_realizador')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos_convidado');
    }
}
