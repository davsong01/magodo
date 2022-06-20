<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub-title')->nullable();
            $table->text('content')->nullable();
            $table->string('background_color')->default('linear-gradient(rgba(3, 61, 117, 0.9),rgba(3, 61, 117, 0.9)');
	        // background: linear-gradient(rgba(239, 69, 77, 0.9),rgba(239, 69, 77, 0.9)),url('../images/bg-3.jpg');
            $table->string('background_image')->default('images/bg-2.jpg');
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
        Schema::dropIfExists('activities');
    }
}
