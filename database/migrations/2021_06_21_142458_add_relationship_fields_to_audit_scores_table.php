<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAuditScoresTable extends Migration
{
    public function up()
    {
        Schema::table('audit_scores', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id', 'title_fk_4212796')->references('id')->on('titles');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_4212797')->references('id')->on('categories');
            $table->unsignedBigInteger('criteria_id')->nullable();
            $table->foreign('criteria_id', 'criteria_fk_4212798')->references('id')->on('criteria');
            $table->unsignedBigInteger('judge_id')->nullable();
            $table->foreign('judge_id', 'judge_fk_4212799')->references('id')->on('judges');
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->foreign('participant_id', 'participant_fk_4212800')->references('id')->on('participants');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4212805')->references('id')->on('teams');
        });
    }
}
