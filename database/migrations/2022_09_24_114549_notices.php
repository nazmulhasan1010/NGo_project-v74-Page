<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notices extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('notices', function (Blueprint $table) {
                $table->id();
                $table->string('title', 1000);
                $table->string('attachment', 1000);
                $table->timestamps();
                $table->boolean('status')->default(true);
            }

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
}