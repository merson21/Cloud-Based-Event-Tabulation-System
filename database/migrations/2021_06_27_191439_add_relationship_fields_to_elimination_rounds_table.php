<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEliminationRoundsTable extends Migration
{
    public function up()
    {
        Schema::table('elimination_rounds', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id', 'title_fk_4263004')->references('id')->on('titles');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_4263005')->references('id')->on('categories');
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->foreign('participant_id', 'participant_fk_4263006')->references('id')->on('participants');
        });
    }
}
