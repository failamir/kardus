<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id', 'teacher_fk_6537102')->references('id')->on('users');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id', 'kelas_fk_6736697')->references('id')->on('kelas');
        });
    }
}
