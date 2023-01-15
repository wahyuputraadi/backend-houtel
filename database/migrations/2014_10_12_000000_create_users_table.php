<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // primary key yang bernama / fieldnya diberi nama "id", tipenya big integer & autoincrement
            $table->string('name'); // tipe nya adalah varchar default length 255, nama fieldnya adalah "name"
            $table->string('email')->unique(); // tipe nya adalah varchar default length 255, nama fieldnya adalah "email" dan UNIQUE
            $table->timestamp('email_verified_at')->nullable(); // tipe nya adalah timestamp default length 255, nama fieldnya adalah "email_verified_at" dan boleh Null
            $table->string('password'); // tipe nya adalah varchar default length 255, nama fieldnya adalah "password"
            $table->enum('role', ['adm', 'ksr']); // tipe nya adalah enum, value pilihannnya adalah Adm & Ksr
            $table->rememberToken(); // tipe nya adalah varchar default length 100, nama fieldnya adalah "rememberToken"
            $table->timestamps(); // membuat field create_at & update_at yang tipenya timestamps 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
