<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
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
            $table->string('product_id', 1000);
            $table->string('title', 1000);
            $table->string('title_bn', 1000);
            $table->longText('description');
            $table->longText('description_bn');
            $table->string('category', 200);
            $table->string('stock');
            $table->string('return')->nullable();
            $table->string('warranty')->nullable();
            $table->longText('additional_info');
            $table->string('owner', 200)->nullable();
            $table->string('price');
            $table->boolean('status')->default(true);
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
        //
    }
}
