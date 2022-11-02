<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPositionsTable extends Migration
{
    public function up()
    {
        Schema::table('positions', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id', 'organization_fk_4015578')->references('id')->on('organizations');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4015584')->references('id')->on('teams');
        });
    }
}
