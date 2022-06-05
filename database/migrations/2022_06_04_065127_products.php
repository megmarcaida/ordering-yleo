<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_sku')->unique();
            $table->string('product_name')->nullable();
            $table->string('product_description')->nullable();
            $table->integer('product_category')->nullable();
            $table->decimal('product_price')->nullable();
            $table->decimal('product_qty')->nullable();
            $table->string('product_unit')->nullable();
            $table->integer('with_limit_qty')->nullable();
            $table->integer('er')->nullable();
            $table->integer('qo')->nullable();
            $table->integer('points')->nullable();
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
        Schema::dropIfExists('products');
    }
}
