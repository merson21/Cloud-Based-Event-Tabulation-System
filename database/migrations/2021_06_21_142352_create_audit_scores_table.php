<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditScoresTable extends Migration
{
    public function up()
    {
        Schema::create('audit_scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scores')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
