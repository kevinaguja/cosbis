<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipEventVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_votes', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
