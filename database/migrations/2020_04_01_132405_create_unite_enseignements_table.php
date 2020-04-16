<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniteEnseignementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unite_enseignements', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('libelle');
            $table->string('note_obtenue');
            $table->string('note_reclame');
            $table->string('type_note');
            /*Cle etrangere reclamation*/
            $table->integer('reclamation_id');
            /*$table->foreignId('reclamation_id')
                ->constrained()
                ->onDelete('cascade');*/
            /*Cle etrangere etape*/
            $table->integer('etape_id');
            /*$table->foreignId('etape_id')
                ->constrained()
                ->onDelete('cascade');*/
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
        Schema::dropIfExists('unite_enseignements');
    }
}
