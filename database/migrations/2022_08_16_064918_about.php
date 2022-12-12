<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class About extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('project_overview')->nullable();
            $table->longText('project_overview_bn')->nullable();
            $table->longText('project_goal')->nullable();
            $table->longText('project_goal_bn')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('mission_bn')->nullable();
            $table->string('values',2000)->nullable();
            $table->string('image',255)->nullable();
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
