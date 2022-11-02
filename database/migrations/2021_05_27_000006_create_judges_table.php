<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgesTable extends Migration
{
    public function up()
    {
        Schema::create('judges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('email')->nullable();
            $table->string('username');
            $table->string('password');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
