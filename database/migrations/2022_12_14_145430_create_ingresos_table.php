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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cantidad')->default(1);
            $table->string('reingreso')->default('');
            $table->string('motivo')->default('')->nullable();
            $table->unsignedBigInteger('article_id')->default(1);
            $table->string('usuario')->default('');

            $table->foreign('article_id')->references('id')->on('articles');

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
        Schema::dropIfExists('ingresos');
    }
};
