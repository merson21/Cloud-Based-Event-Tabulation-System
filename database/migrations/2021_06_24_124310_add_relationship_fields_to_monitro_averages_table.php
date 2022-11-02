<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMonitroAveragesTable extends Migration
{
    public function up()
    {
        Schema::table('monitro_averages', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id', 'title_fk_4240919')->references('id')->on('titles');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_4240920')->references('id')->on('categories');
            $table->unsignedBigInteger('judge_id')->nullable();
            $table->foreign('judge_id', 'judge_fk_4241178')->references('id')->on('judges');
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->foreign('participant_id', 'participant_fk_4240921')->references('id')->on('participants');
        });
    }
}
