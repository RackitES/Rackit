<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmazensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armazens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->text('imagem')->nullable();
            $table->unsignedBigInteger('lista_produtos_id');
            $table->foreign('lista_produtos_id')->references('id')->on('lista_produtos')->onDelete('cascade');

            $table->timestamps();
        });

        // Schema::create('produtos_has_categorias', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('produtos_id');
        //     $table->unsignedBigInteger('categorias_id');



        //     //Chave estrangeira produtos_id
        //     $table->foreign('produtos_id')->references('id')->on('produtos')->onDelete('cascade');

        //     //Chave estrangeira categorias_id
        //     $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');



        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armazens');
    }
}
