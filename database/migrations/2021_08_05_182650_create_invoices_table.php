<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('auction_id')->nullable();
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade');
            $table->string('invoice_number')->unique();
            $table->string('hsn')->nullable();
            $table->integer('gst');
            $table->integer('description');
            $table->float('gross');
            $table->integer('commission_percentage');
            $table->float('commission_amount');
            $table->float('shipping');
            $table->integer('total_gst');
            $table->integer('roundoff');
            $table->float('total_amount');
            $table->string('total_in_words');
            $table->string('delivery_place');
            $table->string('dispatched_place');
            $table->boolean('paid')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
