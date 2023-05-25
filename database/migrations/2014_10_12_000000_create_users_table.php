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
            $table->char('UserID', 5)->primary();
            $table->string('UserName', 50)->unique();
            $table->string('UserEmail', 50)->unique();
            $table->string('UserPhoneNumber', 15)->nullable(true);
            $table->string('UserAddress', 75)->nullable(true);
            $table->string('UserPassword', 255);
            $table->string('Role', 10);
            $table->string('UserProfileImage', 255)->nullable(true);
            $table->rememberToken()->nullable(true);
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
