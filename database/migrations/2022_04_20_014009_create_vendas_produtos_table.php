<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendas_id')->index()->constrained('vendas', 'id');
            $table->foreignId('calcados_id')->index()->constrained('calcados', 'id');
            $table->integer('quantidade');
            $table->decimal('valor_produto', 10, 2);
            $table->integer('desconto')->nullable();
            $table->decimal('valor_pagamento', 10, 2);
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
        Schema::dropIfExists('vendas_produtos');
    }
}
