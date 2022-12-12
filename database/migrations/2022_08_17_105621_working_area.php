<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorkingArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workingAreas', function (Blueprint $table) {
            $table->id();
            $table->string('image',255)->nullable();
            $table->string('area',2000)->nullable();
            $table->string('area_bn',2000)->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_bn')->nullable();
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
