<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 1000)->nullable(); //string length 1000
            $table->string('certification_description', 1000)->nullable(); //string length 1000
            $table->string('who_this_course_is_for', 1000)->nullable(); //string length 1000
            $table->string('price')->nullable();
            $table->string('duration')->nullable();
            $table->string('lessons')->nullable();
            $table->string('enrolled')->nullable();
            $table->string('access_type')->default(Course::LIFE_TIME);
            $table->string('image')->nullable();
            $table->string('cover')->nullable();
            $table->string('status')->default(Course::UNPUBLISHED_COURSE);
            $table->integer('instructor_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            //seting foreign key to refernce id of instructor on users table id
            $table->foreign('instructor_id')->references('id')->on('users');
            // ->onDelete('cascade')
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
        Schema::dropIfExists('courses');
    }
};
