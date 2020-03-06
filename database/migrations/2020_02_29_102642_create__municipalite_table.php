<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipaliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Municipalite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->string('adresse');
            $table->string('email');
            $table->Integer('tel');
            $table->string('fax');
            $table->Integer('code_postal');


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
        Schema::dropIfExists('Municipalite');
    }
}
