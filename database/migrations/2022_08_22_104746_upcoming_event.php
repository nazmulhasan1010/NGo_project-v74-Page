<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpcomingEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title',2000)->nullable();
            $table->string('title_bn',2000)->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_bn')->nullable();
            $table->string('image',255)->nullable();
            $table->string('start',255)->nullable();
            $table->string('end',255)->nullable();
            $table->string('place',255)->nullable();
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
