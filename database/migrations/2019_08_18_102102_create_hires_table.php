<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('photographer_id');
            $table->string('event_name');
            $table->integer('payment');
            $table->string('event_image')->nullable();
            $table->string('event_location');
            $table->string('event_link')->nullable();
            $table->text('event_description')->nullable();
            $table->string('status')->default('block');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('photographer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hires');
    }
}
