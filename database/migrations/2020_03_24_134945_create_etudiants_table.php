<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); /*nom*/
            $table->string('first_name'); /*prenom*/
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('login');
            $table->string('phone');
            $table->string('password');
            $table->integer('numero_carte');
            /*Cle etrangere etablissement*/
            $table->foreignId('etablissement_id')
                ->constrained()
                ->onDelete('cascade');
            /*Cle etrangere option*/
            $table->foreignId('option_id')
                ->constrained()
                ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('etudiants');
    }
}
