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
            $table->foreignId('etudiant_id')
                ->constrained()
                ->onDelete('cascade');
            /*Etape foreign Key*/
            $table->foreignId('etape_id')
                ->constrained()
                ->onDelete('cascade');
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
