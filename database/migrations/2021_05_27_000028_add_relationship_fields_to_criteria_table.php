<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCriteriaTable extends Migration
{
    public function up()
    {
        Schema::table('criteria', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id');
            $table->foreign('title_id', 'title_fk_4015654')->references('id')->on('titles');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_4015659')->references('id')->on('categories');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4015658')->references('id')->on('teams');
        });
    }
}
