<?php

namespace App\Providers;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Instructor;
use App\Policies\CoursePolicy;
use App\Policies\EnrollmentPolicy;
use App\Policies\InstructorPolicy;
use App\Policies\StudentPolicy;
use App\Policies\UserPolicy;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Student::class => StudentPolicy::class,
        Instructor::class => InstructorPolicy::class,
        User::class => UserPolicy::class,
        Enrollment::class => EnrollmentPolicy::class,
        Course::class => CoursePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-action', function ($user) {
            return $user->isAdmin();
        });


        // Passport::routes();
        
        Passport::tokensExpireIn(Carbon::now()->addMinutes(60));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::enableImplicitGrant();

        // Passport::hashClientSecrets();
        // Passport::personalAccessClientSecret(config('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'));
        // Passport::personalAccessClientId(config('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'));
        //registering scopes
        Passport::tokensCan([
            'enroll-course' => 'Enroll into a particular course',
            'manage-courses' => 'Create, read, update and delete courses (CRUD)',
            'manage-account' => 'Read account data, id, name, email, if verifed, if admin (cannot read password). Modify your account data. cannot delete your account',
            'read-general' => 'read general information like enrolled categories, enrolled courses, your enrollments. etc'
        ]);
        // Passport::setDefaultScope([
        //     'read-tasks'
        // ]);
    }
}
