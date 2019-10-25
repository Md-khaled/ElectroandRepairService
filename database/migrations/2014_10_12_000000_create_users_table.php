<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('role_id')->nullable();
           $table->foreign('role_id') ->references('id')->on('roles') ->onDelete('cascade');
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verification_token',128)->nullable();
            $table->string('image')->default('default.png');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
