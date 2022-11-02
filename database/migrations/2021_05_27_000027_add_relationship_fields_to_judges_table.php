<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJudgesTable extends Migration
{
    public function up()
    {
        Schema::table('judges', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id');
            $table->foreign('title_id', 'title_fk_4015665')->references('id')->on('titles');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4015678')->references('id')->on('teams');
        });
    }
}
