<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
                $table->increments('id', true);
                $table->integer('evento_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('horas')->unsigned()->default(0);
                $table->timestamps();
        });
        Schema::table('inscricoes', function ($table) {
            $table->foreign('evento_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
    }

    public function down()
    {
        Schema::drop('inscricoes');
    }
}
