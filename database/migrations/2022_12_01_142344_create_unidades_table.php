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
        Schema::create('unidades', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->timestamps();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
        });

        //adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            //colunas
            $table->unsignedBigInteger('unidade_id');
            //constraint
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionar relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->unsignedBigInteger('unidade_id');
            //constraint
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //1º remover foreign -> <table>_<coluna>_foreign
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //2º remover coluna
            $table->dropColumn('unidade_id');
        });

        //remover relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
