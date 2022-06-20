<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook')->default('https://www.facebook.com/GOFAMINTMAGODO');
            $table->string('twitter')->default('https://twitter.com/gofamintmagodo');
            $table->string('instagram')->default('https://www.instagram.com/gofamintmagodo');
            $table->string('youtube')->default('#');
            $table->string('address')->default('#');
            $table->string('mail')->default('http://gofamintmagodo.org.ng:2095');
            $table->string('phone')->default('');
            $table->string('rp')->default('Pastor Gbenga Ayejuyole');
            $table->string('rp_image')->default('images/rpga.jpg');
            $table->string('youtube_livestream_link')->nullable();
            $table->string('mixlr_livestream_link')->nullable();
            $table->string('facebook_livestream_link')->nullable();
            
            $table->text('rp_greetings')->nullable();
            $table->integer('number_of_leaders')->default(15);
            // Welcome to The Gospel Faith Mission Int (GOFAMINT Church) Wonders Cathedral website. I am excited having you browsing to know more about our church family. We are a congregation that passionately follow Jesus Christ and love God’s people. We worship God with our total being, we study the WORD, spend time in prayers and we love people outside of the church family through generosity, invitation and regular social interactions. We welcome everyone at Wonders Cathedral. No class distinction. It is our hope that all people will feel loved and welcomed at Wonders Cathedral. Just come as you are. Our God is waiting for you. 

            $table->text('faith_declaration')->nullable();
            $table->text('aim')->nullable();
            $table->text('anchor')->nullable();
            $table->text('core_values')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
