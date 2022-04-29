<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fornecedores_id')->index()->constrained('fornecedores', 'id');
            $table->foreignId('calcados_id')->index()->constrained('calcados', 'id');
            $table->integer('estoque_quantidade');
            $table->decimal('preco_entrada',10, 2);
            $table->integer('estoque_minimo');
            $table->date('data_compra');
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
        Schema::dropIfExists('estoques');
    }
}
