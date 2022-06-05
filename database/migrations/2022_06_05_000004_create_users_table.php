<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('active')->nullable();
            $table->string('linked_in')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
