<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('avatar_id')->nullable();
            $table->integer('role_id');
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('email', 256)->unique();
            $table->string('phone', 11)->unique();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->boolean('status')->default(true);
            $table->string('password');
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
        Schema::dropIfExists('admins');
    }
}
