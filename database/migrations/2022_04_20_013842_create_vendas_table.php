<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',10,2);
            $table->decimal('desconto',10,2);
            $table->decimal('juros',10,2);
            $table->decimal('valor_pagamento',10,2);
            $table->string('cupom');
            $table->string('forma_pagamento');
            $table->dateTime('data_venda');
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
        Schema::dropIfExists('vendas');
    }
}
