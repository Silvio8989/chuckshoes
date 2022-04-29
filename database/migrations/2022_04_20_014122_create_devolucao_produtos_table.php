<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucao_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendas_id')->index()->constrained('vendas', 'id');
            $table->foreignId('calcados_id')->index()->constrained('calcados', 'id');
            $table->integer('quantidade');
            $table->string('motivo');
            $table->string('estorno');
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
        Schema::dropIfExists('devolucao_produtos');
    }
}
