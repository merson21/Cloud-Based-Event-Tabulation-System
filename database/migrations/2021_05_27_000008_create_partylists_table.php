<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartylistsTable extends Migration
{
    public function up()
    {
        Schema::create('partylists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('platform')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
