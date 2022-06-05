<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLearnProgressesTable extends Migration
{
    public function up()
    {
        Schema::table('learn_progresses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6736798')->references('id')->on('users');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->foreign('topic_id', 'topic_fk_6736799')->references('id')->on('topics');
        });
    }
}
