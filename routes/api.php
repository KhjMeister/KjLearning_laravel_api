<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('articles',[App\Http\Controllers\ArticleController::class,'getArticles'] );
Route::post('upload-image',[App\Http\Controllers\ArticleController::class,'UploadImage'] );
Route::get('show-all-courses',[App\Http\Controllers\ArticleController::class,'showAllCourses'] );


/* users */

Route::get('me', [App\Http\Controllers\User\UserController::class, 'me']);
Route::resource('users', 'App\Http\Controllers\User\UserController')-> except ( ['create', 'edit']);
Route::get('verify/{token}', [App\Http\Controllers\User\UserController::class, 'verify'])->name('verify');
Route::get('resend/{token}', [App\Http\Controllers\User\UserController::class, 'resend']);


//  students 

Route::resource('students', App\Http\Controllers\Student\StudentController::class)->only( ['index', 'show']);
Route::resource('students.courses', App\Http\Controllers\Student\StudentCourseController::class)->only(['index']);
Route::resource('students.instructors', App\Http\Controllers\Student\StudentInstructorController::class)->only(['index']);
Route::resource('students.enrollments', App\Http\Controllers\Student\StudentEnrollmentController::class)->only(['index']);


//  instructors 
Route::resource('instructors', App\Http\Controllers\Instructor\InstructorController::class)->only(['index', 'show']);
Route::resource('instructors.enrollments', App\Http\Controllers\Instructor\InstructorEnrollmentController::class)->only( ['index']);
Route::resource('instructors.students', App\Http\Controllers\Instructor\InstructorStudentController::class)->only(['index']);
Route::resource('instructors.courses', App\Http\Controllers\Instructor\InstructorCourseController::class)->except(['create', 'edit', 'show']);

/* enrollments */
Route::resource('enrollments', App\Http\Controllers\Enrollment\EnrollmentController::class)->only(['index', 'show']);
Route::resource('enrollments.categories', App\Http\Controllers\Enrollment\EnrollmentCategoryController::class)->only(['index']);
Route::resource('enrollments.topics', App\Http\Controllers\Enrollment\EnrollmentTopicController::class)->only( ['index']);
Route::resource('enrollments.instructors', App\Http\Controllers\Enrollment\EnrollmentInstructorController::class)->only( ['index']);

/* courses */
Route::resource('courses', App\Http\Controllers\Course\CourseController::class)->only(['index', 'show']);
Route::resource('courses.enrollments', App\Http\Controllers\Course\CourseEnrollmentController::class)->only( ['index']);
Route::resource('courses.students', App\Http\Controllers\Course\CourseStudentController::class)->only( ['index']);
Route::resource('courses.categories', App\Http\Controllers\Course\CourseCategoryController::class)->except(['create', 'edit', 'show', 'store']);
Route::resource('courses.topics', App\Http\Controllers\Course\CourseTopicController::class)->except(['create', 'edit', 'show', 'store']);

Route::resource('courses.students.enrollments', App\Http\Controllers\Course\CourseStudentEnrollmentController::class)->only( ['store']);
/* topics */
Route::resource('topics', App\Http\Controllers\Topic\TopicController::class)->except(['create', 'edit']);
Route::resource('topics.courses', App\Http\Controllers\Topic\TopicCourseController::class)->only(['index']);

/* categories */
Route::resource('categories', App\Http\Controllers\Category\CategoryController::class)->except( ['create', 'edit']);
Route::resource('categories.courses', App\Http\Controllers\Category\CategoryCourseController::class)->only( ['index']);
Route::resource('categories.enrollments', App\Http\Controllers\Category\CategoryEnrollmentController::class)->only( ['index']);

Route::post('api/login', [App\Http\Controllers\Home\HomeAuthController::class,'login']);
Route::post('api/register', [App\Http\Controllers\Home\HomeAuthController::class,'register']);
Route::get('api/me', [App\Http\Controllers\Home\HomeAuthController::class, 'me']);


Route::post('oauth.token', [Laravel\Passport\Http\Controllers\AccessTokenController::class ,'issueToken']);