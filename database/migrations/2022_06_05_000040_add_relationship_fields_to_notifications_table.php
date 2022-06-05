<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNotificationsTable extends Migration
{
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6731636')->references('id')->on('users');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_6731641')->references('id')->on('users');
        });
    }
}
