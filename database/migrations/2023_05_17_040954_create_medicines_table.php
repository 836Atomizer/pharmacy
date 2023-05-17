<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->text('barcode')->unique();
            $table->string('group',20);
            $table->text('full')->unique();
            $table->decimal('buys',10,2);
            $table->decimal('sale',10,2);
            $table->integer('prescribed')->nullable();
            $table->unsignedBigInteger('laboratory_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('generic_id');
            $table->unsignedBigInteger('effect_id');
            $table->unsignedBigInteger('composition_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('generic_id')->references('id')->on('generics')->onDelete('cascade');
            $table->foreign('effect_id')->references('id')->on('effects')->onDelete('cascade');
            $table->foreign('composition_id')->references('id')->on('compositions')->onDelete('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('medicines');
    }
}
