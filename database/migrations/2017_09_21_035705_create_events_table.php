<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title',100);
            $table->text('description');
            $table->string('status');
            $table->string('time');
            $table->dateTime('date');
            $table->string('location');
            $table->string('type');
            $table->string('theme');
            $table->text('img');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->integer('views')->default(0);
            //$table->boolean('is_announcement',0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
