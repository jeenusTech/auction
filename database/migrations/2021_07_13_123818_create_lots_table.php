<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_id')->nullable();
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('description');
            $table->float('min_price');
            $table->float('max_price');
            $table->string('thumbnail');
            $table->string('image');
            $table->boolean('sold')->default(0);
            $table->boolean('closed')->default(0);
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
        Schema::dropIfExists('lots');
    }
}
