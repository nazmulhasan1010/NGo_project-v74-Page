<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000);
            $table->string('title_bn', 1000);
            $table->longText('description');
            $table->longText('description_bn');
            $table->string('attachment', 1000);
            $table->string('category', 100);
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
        Schema::dropIfExists('knowledge');
    }
}
