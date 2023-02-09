<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Passport::personalAccessClientId(config('passport.personal_access_client.id'));
        // Passport::personalAccessClientSecret(config('passport.personal_access_client.secret'));
        Schema::defaultStringLength(191);


        //creating an event to fire off when the user is created and send a verification email
        User::created(function ($user) {
            retry(5, function () use ($user) {
                // Mail::to($user)->send(new UserCreated($user));
            }, 100);
        });

        //creating an event to fire off when the user changes email and send a verification email
        User::updated(function ($user) {
            if ($user->isDirty('email')) {
                retry(5, function () use ($user) {
                    Mail::to($user)->send(new UserMailChanged($user));
                }, 100);
            }
        });
    }
}
