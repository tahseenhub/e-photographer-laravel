<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExbImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exb_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exhibition_id');
            $table->string('image_caption',190)->nullable();
            $table->string('image_name',190)->nullable();
            $table->text('about_image')->nullable();
            $table->foreign('exhibition_id')->references('id')->on('exhibitions')->onDelete('cascade');
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
        Schema::dropIfExists('exb_images');
    }
}
