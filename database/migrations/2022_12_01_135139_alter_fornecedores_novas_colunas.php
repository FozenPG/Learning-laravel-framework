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
        //selecionando a tabela exixtente
        Schema::table('fornecedores', function (Blueprint $table) {
            //criando as colunas
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            //para remover as colunas
            //$table->dropColumn('uf');
            //$table->dropColumn('email');
            $table->dropColumn(['uf', 'email']);
        });
    }
};
