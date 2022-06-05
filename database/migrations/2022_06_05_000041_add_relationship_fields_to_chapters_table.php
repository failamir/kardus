<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChaptersTable extends Migration
{
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6734409')->references('id')->on('courses');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_6733488')->references('id')->on('users');
        });
    }
}
