<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('caption',190);
            $table->string('file_name',190);
            $table->integer('price')->default(0);
            $table->text('description')->nullable();
            $table->string('capture_by',190)->nullable();
            $table->string('lens',190)->nullable();         
            $table->string('file_size',190)->nullable();            
            $table->string('resolution',190)->nullable();            
            $table->string('software',190)->nullable();
            $table->integer('view')->default(0);
            $table->integer('like')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoots');
    }
}
