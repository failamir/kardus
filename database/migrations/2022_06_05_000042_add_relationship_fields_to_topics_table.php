<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTopicsTable extends Migration
{
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->unsignedBigInteger('id_chapter_id')->nullable();
            $table->foreign('id_chapter_id', 'id_chapter_fk_6733491')->references('id')->on('chapters');
        });
    }
}
