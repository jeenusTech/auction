<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lots', function (Blueprint $table) {
            $table->float('current_bid')->after('max_price')->nullable();
            $table->float('asking_bid')->after('current_bid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lots', function (Blueprint $table) {
            //
        });
    }
}
