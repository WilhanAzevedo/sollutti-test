<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
● Nome da Loja
    ○ String
    ○ máx 40 caracteres;
    ○ min 3 caracteres;
    ○ mensagem de erros para cada validação em português;
● Email
    ○ String
    ○ Deve ser do tipo email
    ○ Deve ser único;
    ○ mensagem de erros para cada validação em português
*/

class CreateLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lojas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 40);
            $table->string('email', 100)->unique();
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
        Schema::dropIfExists('lojas');
    }
}
