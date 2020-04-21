<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); /*nom*/
            $table->string('first_name'); /*prenom*/
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('login');
            $table->string('phone');
            $table->string('password');
            $table->unsignedInteger('etablissement_id');
            $table->unsignedInteger('role_id');
            /*Cle etrangere etablissement
            $table->foreignId('etablissement_id')
                ->constrained()
                ->onDelete('cascade');
            /*Cle etrangere role
            $table->foreignId('role_id')
                ->constrained()
                ->onDelete('cascade');*/
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
        Schema::dropIfExists('utilisateurs');
    }
}
