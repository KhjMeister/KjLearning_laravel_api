<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Topic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 18; $i++) { 
            Article::create([
                'title' => 'New '. strval($i),
                'text' => 'A New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New Hope',
                'image' => 'http://localhost:8000/images/courses/courses'. strval($i) . '.jpg',
                'price' => '2'.strval($i).'00'
            ]);
        }

        User::create([
            'name' => 'khaled',
            'email' => 'khaled@gmail.com',
            'phone' => Str::random(10),
            'picture' => Str::random(10),
            'password' => bcrypt('123456789'), // secret
            'verified' => 1,
            'verification_token' =>  null ,
            'admin' => User::ADMIN_USER,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_email_public'=>true,
            'about'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet asperiores illum eum nostrum tenetur perferendis, hic aut soluta impedit a dolor accusamus sequi, ducimus dolorum. Eius earum soluta quos deleniti. ',
            'location'=>'Tajikestan',
            'company'=>'Uderam',
            'company_url'=>'RABA-team.app',
            'interests'=>'Dota 2 ,Nextjs',
            'gender'=> 'male',
            'fb_url'=>'kjmeister',
            'tw_url'=>'kjmeister',
            'insta_url'=>'kjmeister',
            'in_url'=>'kjmeister',
        ]);
        User::create([
            'name' => 'jalal',
            'email' => 'jalal@gmail.com',
            'phone' => Str::random(10),
            'picture' => Str::random(10),
            'password' => bcrypt('123456789'), // secret
            'verified' => 1,
            'verification_token' =>  null ,
            'admin' => User::ADMIN_USER,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),'is_email_public'=>true,
            'about'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet asperiores illum eum nostrum tenetur perferendis, hic aut soluta impedit a dolor accusamus sequi, ducimus dolorum. Eius earum soluta quos deleniti. ',
            'location'=>'Tajikestan',
            'company'=>'Uderam',
            'company_url'=>'RABA-team.app',
            'interests'=>'Dota 2 ,Nextjs',
            'gender'=> 'male',
            'fb_url'=>'kjmeister',
            'tw_url'=>'kjmeister',
            'insta_url'=>'kjmeister',
            'in_url'=>'kjmeister',
        ]);
        Category::create([
            'name' => 'Online',
            'description' => 'ostad nagaidam ostad nagaidamostad nagaidamostad nagaidamostad nagaidamostad nagaidamostad nagaidam',
        ]);
        for ($i=1; $i < 18; $i++) { 
            Course::create([
                'id' => $i,
                'name' => "A new style". strval($i),
                'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni quis nesciunt sapiente ad tempore optio perferendis, id aliquid dignissimos consequatur quia ratione iste, reiciendis provident nihil deserunt dolore iusto obcaecati. ",
                'status' => Course::PUBLISHED_COURSE,
                'image' => '/images/courses/courses'. strval($i) . '.jpg',
                'cover' => '/images/courses/course-details.jpg',
                'certification_description' => 'ttttttttttt ipsum dolor sit amet consectetur, adipisicing elit. Magni quis nesciunt sapiente ad tempore optio perferendis, id aliquid dignissimos consequatur quia ratione iste, reiciendis provident nihil deserunt dolore iusto obcaecati. ',
                'who_this_course_is_for' => 'dfdfgdffgdg ipsum dolor sit amet consectetur, adipisicing elit. Magni quis nesciunt sapiente ad tempore optio perferendis, id aliquid dignissimos consequatur quia ratione iste, reiciendis provident nihil deserunt dolore iusto obcaecati. ',
                'price' =>  strval($i) ,
                'duration' =>  strval($i).' Week',
                'lessons' =>  strval($i) ,
                'enrolled' =>  strval($i) ,
                'access_type' =>  'life_time' ,
                'instructor_id' => 1, //select single user
            ]);
            DB::table('category_course')->insert(
                array(
                       'category_id'     =>   1, 
                       'course_id'   =>  $i
                )
           );
            Topic::create([
                'id' => $i,
                'name' => "A new style". strval($i),
                'duration'=> $i,
                'description' => strval($i).'ostad nagaidam ostad nagaidamostad nagaidamostad nagaidamostad nagaidamostad nagaidamostad nagaidam',
                'video' => '1.mp4',
                'notes' => '1.pdf',
            ]);
            DB::table('course_topic')->insert(
                array(
                    'course_id'   =>   $i,
                    'topic_id'     =>   $i
                )
                );

        }
        
        Enrollment::create([
            'student_id' => 1,
            'course_id' => 1,
        ]);
        
   
        // Topic::create([
        //     'name' => 'ostad',
        //     'description' => 'ostad nagaidam ostad nagaidamostad nagaidamostad nagaidamostad nagaidamostad nagaidamostad nagaidam',
        //     'video' => '1.mp4',
        //     'notes' => '1.pdf',
        // ]);
        

        
    //    DB::table('course_topic')->insert(
    //     array(
    //         'course_id'   =>   1,
    //         'topic_id'     =>   1
    //     )
    //     );

        DB::table('oauth_clients')->insert(
            array(
                'id'   =>  1 ,
                'user_id'   => 1 ,
                'name'   =>  'kjmeister' ,
                'secret'   =>  'iEXAXF7kUpDyJcwFtq1sjv0velqhkwX7tfl4Qa9m' ,
                'provider'   =>  NULL ,
                'redirect'   =>  'http://localhost/auth/callback' ,
                'personal_access_client'   =>  '0' ,
                'password_client'   => '0'  ,
                'revoked'   =>  '0' ,
                'created_at'   =>  '2023-02-04 18:05:19' ,
                'updated_at'   => '2023-02-04 18:05:19'  
            )
            );
        
            DB::table('oauth_clients')->insert(
                array(
                    'id'   => 2  ,
                    'user_id'   => 2  ,
                    'name'   =>  'Laravel Personal Access Client' ,
                    'secret'   =>  'OOWIBxhLUcu6RCE4MRxPe62ojRLCXdQSLkV6mm8g' ,
                    'provider'   => NULL  ,
                    'redirect'   => 'http://localhost'  ,
                    'personal_access_client'   =>  '1' ,
                    'password_client'   =>  '0' ,
                    'revoked'   =>  '0' ,
                    'created_at'   => '2023-02-04 18:08:52'  ,
                    'updated_at'   => '2023-02-04 18:08:52'  
                )
                );


                DB::table('oauth_clients')->insert(
                    array(
                        'id'   =>  4 ,
                        'user_id'   =>  2 ,
                        'name'   =>  'Laravel Personal Access Client' ,
                        'secret'   =>  '3g6KwbSeIv1sPAIP0oC2JJ7SewOTCAua281WVEsT' ,
                        'provider'   => NULL  ,
                        'redirect'   =>  'http://localhost' ,
                        'personal_access_client'   => '1'  ,
                        'password_client'   =>  '0' ,
                        'revoked'   =>  '0',
                        'created_at'   => '2023-02-04 18:14:09'  ,
                        'updated_at'   =>  '2023-02-04 18:14:09' ,
                    )
                    );
                    DB::table('oauth_personal_access_clients')->insert(
                        array(
                            'id'   =>   1,
                            'client_id'     =>   2,
                            'created_at'   => '2023-02-04 18:14:09'  ,
                            'updated_at'   =>  '2023-02-04 18:14:09' ,
                        )
                        );
                        DB::table('oauth_personal_access_clients')->insert(
                            array(
                                'id'   =>   2,
                                'client_id'     =>   4,
                                'created_at'   => '2023-02-04 18:14:09'  ,
                                'updated_at'   =>  '2023-02-04 18:14:09' ,
                            )
                            );
                   
            // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::truncate();
        // Category::truncate();
        // Courses::truncate();
        // Topic::truncate();
        // Enrollment::truncate();

        //use the db facade to truncate the pivot tables since they dont have models
        // DB::table('category_course')->truncate();
        // DB::table('course_topic')->truncate();

        ///prevent listening to events when running our db seed command
        // User::flushEventListeners();
        // Category::flushEventListeners();
        // Courses::flushEventListeners();
        // Topic::flushEventListeners();
        // Enrollment::flushEventListeners();


        //setting quntity for the entities to put in database
        // $usersQuantity = 1000;
        // $categoriesQuantity = 30;
        // $topicsQuantity = 100;
        // $coursesQuantity = 100;
        // $enrollmentsQuantity = 200;


        // \App\Models\User::factory()->create($usersQuantity);
        // \App\Models\Category::factory()->create($categoriesQuantity);
        // \App\Models\Topic::factory()->create($topicsQuantity);
        // \App\Models\Courses::factory()->create($coursesQuantity)->each(
        //     function ($course) {
        //         $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
        //         $topics = Topic::all()->random(mt_rand(1, 5))->pluck('id');

        //         $course->categories()->attach($categories); //attching categories
        //         $course->topics()->attach($topics); //attaching topics
        //     }
        // );
        // \App\Models\Enrollment::factory()->create($enrollmentsQuantity);
        // factory(User::class, $usersQuantity)->create();
        // factory(Category::class, $categoriesQuantity)->create();
        // factory(Topic::class, $topicsQuantity)->create();
        //create courses and attach relationships to each of them
        // factory(Courses::class, $coursesQuantity)->create()->each(
        //     function ($course) {
        //         $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
        //         $topics = Topic::all()->random(mt_rand(1, 5))->pluck('id');

        //         $course->categories()->attach($categories); //attching categories
        //         $course->topics()->attach($topics); //attaching topics
        //     }
        // );
        // factory(Enrollment::class, $enrollmentsQuantity)->create();
    }
}
