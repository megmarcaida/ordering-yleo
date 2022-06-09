<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_member_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_pin')->nullable();
            $table->string('queue_number')->nullable();
            $table->date('date')->nullable();
            $table->string('order_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('remarks')->nullable();
            $table->decimal('total_price')->nullable();
            $table->decimal('total_pv')->nullable();
            $table->decimal('total_qty')->nullable();
            $table->string('last_four_digit')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
