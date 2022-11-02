<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(0)->nullable();
            $table->string('status_2');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->integer('score_min');
            $table->integer('score_max');
            $table->string('basetype');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
