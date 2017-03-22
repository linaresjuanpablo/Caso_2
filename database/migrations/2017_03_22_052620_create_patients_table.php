<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento', 15)->unique();
            $table->string('tipo_documento', 2);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('sexo', 1);
            $table->date('fecha_nacimiento');
            $table->string('eps', 50);
            $table->string('telefono', 15);
            $table->string('direccion', 100);
            $table->string('nombres_acudiente', 100);
            $table->string('telefono_acudiente', 15);
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
        Schema::dropIfExists('patients');
    }
}
