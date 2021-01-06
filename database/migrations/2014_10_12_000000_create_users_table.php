<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',190);
            $table->string('email',190)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',190);
            $table->string('image',170);
            $table->string('tagline',190)->nullable();;
            $table->string('facebook',190)->nullable();;
            $table->string('instagram',190)->nullable();;
            $table->string('rating',190)->nullable();;
            $table->string('address',190)->nullable();;
            $table->string('type',190);
            $table->string('status',190)->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
