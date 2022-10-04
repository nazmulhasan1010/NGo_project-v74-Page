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
            $table->string('title', 1000);
            $table->string('description', 5000);
            $table->string('category', 200);
            $table->string('owner_name', 200);
            $table->string('owner_email', 200);
            $table->string('owner_contact', 200);
            $table->string('owner_address', 200);
            $table->string('image', 500);
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
