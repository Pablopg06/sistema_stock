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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            //$table->string('slug')->default('slug');
            $table->string('proveedor');
            $table->unsignedBigInteger('codigo');
            $table->string('foto');
            $table->string('filtro')->default('ninguno');
            $table->string('marca');
            $table->unsignedBigInteger('stock')->default(0);
            $table->unsignedBigInteger('stock_ideal')->default(0);
            $table->unsignedBigInteger('stock_minimo')->default(0);
            $table->string('deposito');
            $table->unsignedBigInteger('category_id')->default(1);

            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('articles');
    }
};