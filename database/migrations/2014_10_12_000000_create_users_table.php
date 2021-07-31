<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('fullname');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('landmark');
            $table->integer('country');
            $table->integer('state');
            $table->integer('city');
            $table->string('pincode');
            $table->string('mobile_1');
            $table->string('mobile_2')->nullable();
            $table->boolean('mobile_verify')->default('0');
            $table->boolean('mobile_notification')->default('0');
            $table->boolean('email_notification')->default('0');
            $table->string('pan')->nullable();
            $table->string('pan_status')->nullable();
            $table->string('pan_file')->nullable();
            $table->boolean('pan_verify')->default('0');
            $table->string('aadhaar')->nullable();
            $table->string('aadhaar_status')->nullable();
            $table->string('aadhaar_file_1')->nullable();
            $table->string('aadhaar_file_2')->nullable();
            $table->boolean('aadhaar_verify')->default('0');
            $table->string('passport');
            $table->string('passport_file_1');
            $table->string('passport_file_2');
            $table->boolean('passport_verify')->default('0');
            $table->string('reference_name_1')->nullable();
            $table->string('refernce_name_2')->nullable();
            $table->string('reference_number_1')->nullable();
            $table->string('refernce_number_2')->nullable();
            $table->string('bid_plan_amount')->nullable();
            $table->boolean('bid_limit_request')->default('0');
            $table->string('bid_limit_request_amount')->nullable();
            $table->float('bid_used')->default('0');
            $table->boolean('block')->default('0');
            $table->boolean('user_verify')->default('0');
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
