<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
● Nome
    ○ String;
    ○ máx 60 caracteres;
    ○ min 3 caracteres;
    ○ mensagem de erros para cada validação em português;
● Valor
    ○ Integer
    ○ Mínimo de 2 caracteres;
    ○ Máximo de 6 caracteres;
    ○ Mensagem de erro para cada validação em português;
● Loja_id;
    ○ Integer;
● Ativo
    ○ Boolean;

*/

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60);
            $table->integer('valor');
            $table->unsignedBigInteger('loja_id');
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
            $table->boolean('ativo');
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
        Schema::dropIfExists('produtos');
    }
}
