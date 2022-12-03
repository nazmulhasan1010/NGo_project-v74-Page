<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepreneursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrepreneurs', function (Blueprint $table) {
            $table->id();
            $table->string('owner_company', 200)->nullable();
            $table->string('owner_name', 200)->nullable();
            $table->string('owner_company_logo', 200)->nullable();
            $table->string('owner_email', 200)->nullable();
            $table->string('owner_contact', 200)->nullable();
            $table->string('owner_address', 200)->nullable();
            $table->string('mapLink',5000)->nullable();
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
        Schema::dropIfExists('entrepreneurs');
    }
}
