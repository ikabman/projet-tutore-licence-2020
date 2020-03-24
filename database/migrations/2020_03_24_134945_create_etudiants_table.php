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
            $table->string('password');
            $table->string('phone');
            $table->integer('numero_carte');/*id*/
            $table->string('option');
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
