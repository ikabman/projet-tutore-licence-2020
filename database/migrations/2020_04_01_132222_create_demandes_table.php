<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('demandeable_id');
            $table->string('demandeable_type');
            $table->date('date_depot');
            $table->string('etat');
            /*Etudiant foreign Key*/
            $table->integer('etudiant_id');
            /*$table->foreignId('etudiant_id')
                ->constrained()
                ->onDelete('cascade');*/
            $table->integer('montant');
            $table->boolean('payement')->default(0);
            $table->boolean('confirmation')->default(0);
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
        Schema::dropIfExists('demandes');
    }
}
