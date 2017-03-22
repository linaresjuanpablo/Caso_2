<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();
            $table->integer('valor');
            $table->string('estado',20);
            $table->timestamps();
            $table->foreign('paciente_id')->references('id')->on('patiens')
             ->onUpdate('cascade')
             ->onDelete('cascade');

            //FK
             $table->foreign('medico_id')->references('id')->on('doctors')
             ->onUpdate('cascade')
             ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
