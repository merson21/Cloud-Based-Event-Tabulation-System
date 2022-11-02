<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAuditVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audit_voters', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id', 'organization_fk_4149507')->references('id')->on('organizations');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id', 'position_fk_4149508')->references('id')->on('positions');
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_4149509')->references('id')->on('candidates');
            $table->unsignedBigInteger('voter_id')->nullable();
            $table->foreign('voter_id', 'voter_fk_4149510')->references('id')->on('voters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audit_voters', function (Blueprint $table) {
            //
        });
    }
}
