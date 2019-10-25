<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
           $table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');
           $table->unsignedBigInteger('address_id')->nullable();
           $table->foreign('address_id') ->references('id')->on('addresses') ->onDelete('cascade');
            $table->string('orderNumber');
            $table->string('total');
            $table->string('payment');
            $table->string('transaction_id')->nullable();
            $table->string('process')->default('pending');
            $table->unsignedBigInteger('processed_by')->nullable();
           $table->foreign('processed_by') ->references('id')->on('users') ->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
