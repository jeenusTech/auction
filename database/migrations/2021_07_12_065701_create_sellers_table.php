<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_image');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('address');
            $table->bigInteger('lot_number');
            $table->float('expected_price');
            $table->float('allot_price')->nullable();
            $table->boolean('approved')->default('0');
            $table->boolean('declined')->default('0');
            $table->boolean('pending')->default('1');
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
        Schema::dropIfExists('sellers');
    }
}
