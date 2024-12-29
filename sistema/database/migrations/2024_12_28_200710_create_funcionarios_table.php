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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id(); // Chave primária automática
            $table->string('nome'); // Campo de texto para o nome
            $table->string('cpf')->unique(); // CPF único, tipo string para permitir formatar
            $table->date('data_nascimento'); // Campo de data
            $table->string('telefone')->nullable(); // Campo numérico para telefone (nullable)
            $table->enum('genero', ['Masculino', 'Feminino', 'Outro'])->nullable(); // Campo com opções fixas
            $table->timestamps(); // Adiciona campos created_at e updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
