<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalcadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calcados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marca_id')->index()->constrained('calcado_marcas', 'id');
            $table->foreignId('cor_id')->index()->constrained('calcado_cor', 'id');
            $table->foreignId('genero_id')->index()->constrained('calcado_generos', 'id');
            $table->foreignId('tamanhos_id')->index()->constrained('calcado_tamanhos', 'id');
            $table->string('modelo');
            $table->decimal('preco_venda',10, 2);
            $table->integer('desconto'); 
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
        Schema::dropIfExists('calcados');
    }
}
