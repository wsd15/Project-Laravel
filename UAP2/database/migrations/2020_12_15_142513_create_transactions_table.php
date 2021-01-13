<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('pizza_id');
            $table->Integer('cart_id');
            $table->integer('total_qty');
            $table->integer('total_price');
            // $table->date('transaction_date');
            $table->timestamps();

            // $table->foreign('pizza_id')->references('id')->on('pizzas');
            // $table->foreign('cart_id')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
