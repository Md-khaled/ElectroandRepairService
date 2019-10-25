<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrantees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
           $table->foreign('product_id')->references('id')->on('products') ->onDelete('cascade');
           $table->string('Wdays')->comment('Product-warrantee');
           $table->tinyInteger('qty')->default(1);
           $table->string('status')->default('active');
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
        Schema::dropIfExists('warrantees');
    }
}
