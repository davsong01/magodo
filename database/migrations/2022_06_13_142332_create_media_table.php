<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable(); //audio, video, mixl, youtube
            $table->string('mixlr_link')->nullable(); 
            $table->string('youtube_link')->nullable(); 
            $table->string('file')->nullable(); 
            $table->string('title');
            $table->string('slug');
            $table->string('uploaded_by');
            $table->string('status')->default('draft');
            $table->string('isFree')->default('yes');
            $table->float('price')->default(00.00);

            $table->string('featured_image')->default('assets/media/featured_images/blog-3.jpeg');
            $table->string('minister')->nullable();
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
        Schema::dropIfExists('media');
    }
}
