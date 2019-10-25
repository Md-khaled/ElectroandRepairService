<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
           $table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');
           $table->unsignedBigInteger('brand_id')->nullable();
           $table->foreign('brand_id') ->references('id')->on('brands') ->onDelete('cascade');
           $table->unsignedBigInteger('category_id')->nullable();
           $table->foreign('category_id') ->references('id')->on('categories') ->onDelete('cascade');
            $table->string('title',128)->unique();
            $table->string('img')->nullable();
            $table->longText('content');
            $table->string('warranty')->nullable();
            $table->decimal('price',8,2);
            $table->decimal('sale_price',8,2);
            $table->integer('quantity')->default(1);
            $table->decimal('discount',10,2)->default(0.00);
            $table->string('copoun')->nullable();
            $table->tinyInteger('status')->default(0);
            

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
        Schema::dropIfExists('products');
    }
}
