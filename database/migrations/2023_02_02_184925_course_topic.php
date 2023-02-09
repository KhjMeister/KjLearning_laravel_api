<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_topic', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('topic_id')->unsigned();

            //set forign keys
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
        // Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('course_topic');
    }
};
