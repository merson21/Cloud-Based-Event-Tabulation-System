<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAlertsTable extends Migration
{
    public function up()
    {
        Schema::create('user_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alert_text', 255)->nullable();
            $table->string('alert_link', 5000)->nullable();
            $table->timestamps();
        });
    }
}
