<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Enrollments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('experience_center')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('email')->nullable();
            $table->string('member_id_enroller')->nullable();
            $table->string('member_id_sponsor')->nullable();
            $table->string('username')->nullable();
            $table->string('digit_pin')->nullable();
            $table->string('tin')->nullable();
            $table->string('order_type')->nullable();
            $table->string('enrollment_kit')->nullable();
            $table->string('other_info')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('valid_id')->nullable();
            $table->string('queue_number')->nullable();
            $table->datetime('date')->nullable();
            $table->integer('status')->nullable();
            $table->integer('enabled')->nullable();
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
        Schema::dropIfExists('enrollments');
    }
}
