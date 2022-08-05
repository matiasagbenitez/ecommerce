<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('color_size', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity');

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');

            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('color_size');
    }
};
