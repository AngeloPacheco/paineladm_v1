a<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportadoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social',80);
            $table->string('nome_fantasia',80);
            $table->string('cnpj',45)->unique();
            $table->string('inscricao_estadual',45)->nullable();
            $table->string('logradouro',45);
            $table->string('numero',10);
            $table->string('complemento',20);
            $table->string('bairro',45);
            $table->string('localidade',45);
            $table->string('cep',45);
            $table->char('uf',2);
            $table->string('email',45)->nullable();
            $table->string('telefone',45)->nullable();
            $table->string('fax',45)->nullable();
            $table->string('celular',45)->nullable();
            $table->string('contato',45)->nullable();
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
        Schema::dropIfExists('transportadoras');
    }
}
