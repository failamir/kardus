<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6737033')->references('id')->on('users');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id', 'payment_fk_6737034')->references('id')->on('list_payments');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_6737037')->references('id')->on('courses');
        });
    }
}
