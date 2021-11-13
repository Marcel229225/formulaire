<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->id();
            $table->string('chantier');
            $table->integer('numero');
            $table->string('nom_prenom');
            $table->integer('age');
            $table->string('poste_de_travail');
            $table->text('Plaintes');
            $table->integer('poids');
            $table->string('taille');
            $table->string('ta');
            $table->integer('pt');
            $table->integer('pa');
            $table->integer('pouls');
            $table->integer('av_od');
            $table->integer('og');
            $table->text('examen_physique');
            $table->string('glucoserie');
            $table->string('albiminurie');
            $table->string('autres');
            $table->string('sang');
            $table->text('conduite_a_tenir');
            $table->text('aptitude');
            $table->string('lieu');
            $table->text('');
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
        Schema::dropIfExists('medicals');
    }
}
