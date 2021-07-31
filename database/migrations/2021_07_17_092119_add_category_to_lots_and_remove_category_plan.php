<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToLotsAndRemoveCategoryPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lots', function (Blueprint $table) {
            $table->dropForeign(['category_plan']);
            $table->renameColumn('category_plan', 'category');

            $table->foreign('category')->references('id')->on('categories')->onDelete('set null');
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
            $table->dropForeign(['category']);
            $table->foreign('category')->references('id')->on('categories')->onDelete('set null');
        });
    }
}
