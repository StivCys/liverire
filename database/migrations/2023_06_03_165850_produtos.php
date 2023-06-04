<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->nullable();
            $table->text('descricao')->nullable();
            $table->integer('peso')->nullable();
            $table->integer('estoque_disponivel')->nullable();
            $table->decimal('preco_custo',10,2)->default(0.1);
            $table->decimal('preco_venda',10,2)->default(0.1);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->enum('flag_tipo',['I','P','C','W'])->comment('I = industrializados, P = produtos prontos(ex:salgados), C=Produtos da cozinha, W=produtos cobrados por peso ' );

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('produtos');

    }
};
