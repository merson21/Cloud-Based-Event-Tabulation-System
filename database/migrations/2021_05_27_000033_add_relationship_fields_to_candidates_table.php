<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCandidatesTable extends Migration
{
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id', 'organization_fk_4015597')->references('id')->on('organizations');
            $table->unsignedBigInteger('partylist_id')->nullable();
            $table->foreign('partylist_id', 'partylist_fk_4015598')->references('id')->on('partylists');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id', 'position_fk_4015603')->references('id')->on('positions');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4015602')->references('id')->on('teams');
        });
    }
}
