<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartylistsTable extends Migration
{
    public function up()
    {
        Schema::table('partylists', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id', 'organization_fk_4015594')->references('id')->on('organizations');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4015593')->references('id')->on('teams');
        });
    }
}
