<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->default('false');
            $table->string('votersid')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('gender')->default('Male');
            $table->integer('age')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
