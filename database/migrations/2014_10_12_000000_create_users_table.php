<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('dept_id');
            $table->string('u_image')->unique();
            $table->string('u_firstname');
            $table->string('u_lastname');
            $table->integer('u_age');
            $table->string('u_address');
            $table->string('u_contact_number');
            $table->string('u_email')->unique();
            $table->string('u_username')->unique();
            $table->string('u_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
