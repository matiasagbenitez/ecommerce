<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('contact');
            $table->string('phone');

            $table->enum('status', [Order::PENDIENTE, Order::PAGADO, Order::ENVIADO, Order::ENTREGADO, Order::ANULADO])->default(Order::PENDIENTE);
            $table->enum('shipping_type', [1, 2])->default(1);
            $table->float('shipping_cost');
            $table->float('total');
            $table->json('content');

            $table->string('adress')->nullable();
            $table->string('references')->nullable();

            // $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments');

            // $table->unsignedBigInteger('city_id')->nullable();
            // $table->foreign('city_id')->references('id')->on('cities');

            // $table->unsignedBigInteger('district_id')->nullable();
            // $table->foreign('district_id')->references('id')->on('districts');

            $table->json('shipping_data')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
