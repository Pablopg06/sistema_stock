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
            $table->string('nombre')->default('');
            //$table->string('slug')->default('slug');
            $table->string('proveedor')->default('');
            $table->unsignedBigInteger('codigo')->default(0);
            $table->string('foto')->default('');
            $table->string('filtro')->default('ninguno');
            $table->string('marca')->default('');
            $table->unsignedBigInteger('stock')->default(0);
            $table->unsignedBigInteger('stock_ideal')->default(0);
            $table->unsignedBigInteger('stock_minimo')->default(0);
            $table->string('deposito')->default('');
            $table->unsignedBigInteger('subcategory_id')->default(1);

            $table->foreign('subcategory_id')->references('id')->on('sub_categories');

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