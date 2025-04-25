<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('etudiants', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('post_nom');
        $table->string('prenom');
        $table->string('genre');
        $table->date('date_naissance');
        $table->string('matricule')->unique();
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
    });
}
};
