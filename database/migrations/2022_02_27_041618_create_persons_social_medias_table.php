<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsSocialMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons_social_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link_profile');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('social_media_id');
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('CASCADE');
            $table->foreign('social_media_id')->references('id')->on('social_medias')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons_social_medias');
    }
}
