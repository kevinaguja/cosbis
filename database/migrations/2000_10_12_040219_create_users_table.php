<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_number');
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->date('birthdate');
            $table->string('address')->default('College of San Benildo- Rizal');
            $table->boolean('is_verified')->default(false);
            $table->integer('role_id')->default(2)->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone',50);
            $table->string('program',20)->nullable();
            $table->text('img')->nullable();
            $table->boolean('is_suspended')->default(false);
            $table->text('token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('users');
    }
}
