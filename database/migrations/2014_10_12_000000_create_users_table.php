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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('steamid')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('profileURL')->nullable();
            $table->string('password')->nullable();
            $table->unsignedTinyInteger('buys')->default(0);
            $table->string('remember_token')->nullable();
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
};
