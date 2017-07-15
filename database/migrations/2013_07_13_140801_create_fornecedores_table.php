<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social',80);
            $table->string('nome_fantasia',80);
            $table->string('cnpj',45);
            $table->string('inscricao_estadual',45)->nulllable();
            $table->string('logradouro',45)->nulllable();
            $table->string('numero',10)->nulllable();
            $table->string('complemento',20)->nulllable();
            $table->string('bairro',45)->nulllable();
            $table->string('localidade',45)->nulllable();
            $table->string('cep',45)->nulllable();
            $table->char('uf',2)->nulllable();
            $table->string('email',45)->nulllable();
            $table->string('telefone',45)->nulllable();
            $table->string('fax',45)->nulllable();
            $table->string('celular',45)->nulllable();
            $table->string('contato',45)->nulllable();
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
        Schema::dropIfExists('fornecedores');
    }
}
