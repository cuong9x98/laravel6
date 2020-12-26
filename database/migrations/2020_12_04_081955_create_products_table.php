<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('promotion')->default(0);
            $table->string('image');
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('disk')->nullable();
            $table->string('vga')->nullable();
            $table->string('screen')->nullable();
            $table->string('resolution')->nullable();
            $table->string('video')->nullable();
            $table->integer('view')->default(0);
            $table->integer('buy_count')->default(0);
            $table->integer('status')->default(0);
            $table->integer('check');
            $table->integer('productline_id');
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
