<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->nullable();
            $table->integer('room_main_id')->nullable();
            $table->integer('room_extra_id')->nullable();
            $table->string('code');
            $table->string('name');
            $table->integer('price');
            $table->integer('count');
            $table->string('size');
            $table->string('trademark')->nullable();
            $table->string('material_main')->nullable();
            $table->string('material_extra')->nullable();
            $table->string('color')->nullable();
            $table->string('fluent')->nullable();
            $table->string('origin')->nullable();
            $table->string('function')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('types');
        Schema::dropIfExists('rooms');
    }
}
