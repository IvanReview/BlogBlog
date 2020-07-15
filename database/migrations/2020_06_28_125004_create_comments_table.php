<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');

            $table->string('name')->nullable();
            $table->integer('parent_id');
            $table->unsignedBigInteger('article_id')->unsigned()->default(0);
            /*$table->foreign('article_id')->references('id')->on('articles');*/ //связь таблички comment & articles

            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            /*$table->foreign('user_id')->references('id')->on('users');*/ //связь таблички comment & users
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
        Schema::dropIfExists('comments');
    }
}
