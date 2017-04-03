<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->mediumText('descricao')->nullable();
            $table->mediumText('mais_sobre')->nullable();
            $table->string('local')->nullable();
            $table->integer('cargaHoraria');
            $table->string('palestrante')->nullable();            

            $table->date('data_evento');
            $table->time('horario_evento');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('vagas');


            $table->integer('inscritos')->default(0);
            $table->boolean('insc_status')->default(true);

            $table->boolean('has_banner')->default(false);
            $table->string('name_banner')->default("");


            $table->boolean('status')->default(true);
            $table->boolean('disabled')->default(false);

            $table->boolean('aluno')->default(false);
            $table->boolean('agente')->default(false);
            $table->boolean('professor')->default(false);
            $table->boolean('comunidade')->default(false);

            $table->string('fb_link', 500)->default('http://');


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
        Schema::drop('events');
    }
}
