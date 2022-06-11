<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PickupOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_member_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('queue_number')->nullable();
            $table->datetime('date')->nullable();
            $table->string('experience_center')->nullable();
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
        Schema::dropIfExists('pickup_orders');
    }
}
