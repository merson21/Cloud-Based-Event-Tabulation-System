<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaTable extends Migration
{
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('name');
            $table->string('percentage')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
