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
            $table->bigIncrements('id');
            $table->foreignId('cart_id')->constrained('carts')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('paymentmethod_id')->constrained('paymentmethods')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('courier_id')->constrained('couriers')->onDelete('restrict')->onUpdate('restrict');
            $table->dateTime('payment_deadline');
            $table->integer('total_payment');

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
        Schema::dropIfExists('transactions');
    }
}
