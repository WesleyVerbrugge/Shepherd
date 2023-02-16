<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string("username")->unique(); // Username
            $table->string("e_mail")->unique(); // User e-mail
            $table->string("full_name")->unique(); // User full name
            $table->unsignedBigInteger('superintendent_id')->nullable(); // User id of the super intendent user.

            $table->string('password', 60)->nullable()->default(null);
            $table->rememberToken();

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
}
