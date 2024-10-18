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
        Schema::create('tb_linguas', function (Blueprint $table) {
            $table->id('idLingua'); // Cria a coluna idLingua como chave primária
            $table->string('nomeLingua'); // Cria a coluna nomeLingua como string
            $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_linguas'); // Remove a tabela tb_linguas
    }
};
