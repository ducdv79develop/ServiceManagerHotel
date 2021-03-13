<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('room_main_id')->nullable();
            $table->integer('room_extra_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->tinyInteger('sort_order')->default(1);
            $table->string('status')->default(true);
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
        Schema::dropIfExists('categories');
    }
}
