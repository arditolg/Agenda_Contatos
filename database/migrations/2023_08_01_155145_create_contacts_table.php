<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cep', 10);
            $table->string('estado', 2);
            $table->string('cidade');
            $table->string('bairro');
            $table->string('endereco', 255);
            $table->integer('numero');
            $table->string('nome_de_contato');
            $table->string('email_de_contato', 100);
            $table->string('telefone_de_contato', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
