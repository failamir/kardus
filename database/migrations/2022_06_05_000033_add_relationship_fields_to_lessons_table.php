<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6537113')->references('id')->on('courses');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->foreign('topic_id', 'topic_fk_6736698')->references('id')->on('topics');
        });
    }
}
