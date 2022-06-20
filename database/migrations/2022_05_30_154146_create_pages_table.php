<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('isNav')->nullable(); // yes, no
            $table->string('navOrder')->nullable();
            $table->string('status')->nullable(); // yes, no
            $table->string('banner')->nullable();
            $table->text('content')->nullable();
            $table->string('type')->default('normal');
            $table->string('isParent')->nullable();
            $table->string('parent_id')->nullable();

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
        Schema::dropIfExists('pages');
    }
}
