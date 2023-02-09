<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // $2y$10$fIBM.1SKMkX.LOlRm1tAguPHMHL/2GHX05FblWQwOjPPe8.u0G4T.
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verified')->default(User::UNVERIFIED_USER); //all new users should be unverified
            $table->string('verification_token')->nullable();
            $table->string('admin')->default(User::REGULAR_USER); //user is regular at first
            $table->string('password');
            $table->string('picture')->nullable();
            $table->boolean('is_email_public')->default(true);
            $table->string('about',1000)->nullable();
            $table->string('location')->nullable();
            $table->string('company')->nullable();
            $table->string('company_url')->nullable();
            $table->string('interests')->nullable();
            $table->string('gender')->default(User::GENDER_MALE);
            $table->string('fb_url')->nullable();
            $table->string('tw_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->string('in_url')->nullable();
      

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
