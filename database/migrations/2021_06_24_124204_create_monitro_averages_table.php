<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitroAveragesTable extends Migration
{
    public function up()
    {
        Schema::create('monitro_averages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('average')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
