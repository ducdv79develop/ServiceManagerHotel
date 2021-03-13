<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('avatar_id')->nullable();
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('email', 256)->unique();
            $table->string('phone', 11)->unique();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->string('code');
            $table->timestamp('verified_at')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('password');
            $table->boolean('status')->default(true);
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
