<?php

namespace App\Transformers;

use App\Models\Course;
use League\Fractal\TransformerAbstract;

class CourseTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Course $course)
    {
        return [
            'id' => (int)$course->id,
            'name' => (string)$course->name,
            'description' => (string) $course->description,
            'image' => (string)$course->image,

            'cover' => (string)$course->cover,
            'certification_description' =>(string)$course->certification_description,
            'who_this_course_is_for' =>(string)$course->who_this_course_is_for,
            'price' =>(string)$course->price,
            'lessons' =>(string)$course->lessons,
            'duration' =>(string)$course->duration,
            'access_type' =>(string)$course->access_type, 
            'enrolled' =>(string)$course->enrolled,

            'isPublished' => (string) $course->status,
            'instructor' => (int) $course->instructor_id,
            'creationDate' => (string)$course->created_at,
            'lastChange' => (string)$course->updated_at,
            'deletedDate' => isset($course->deleted_at) ? (string)$course->deleted_at : null,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('courses.show', $course->id)
                ],
                [
                    'rel' => 'courses.enrollments',
                    'href' => route('courses.enrollments.index', $course->id)
                ],
                [
                    'rel' => 'courses.students',
                    'href' => route('courses.students.index', $course->id)
                ],
                [
                    'rel' => 'courses.categories',
                    'href' => route('courses.categories.index', $course->id)
                ],
                [
                    'rel' => 'courses.topics',
                    'href' => route('courses.topics.index', $course->id)
                ],
                [
                    'rel' => 'instructor',
                    'href' => route('instructors.show', $course->instructor_id)
                ],

            ]
        ];
    }




    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'image' => 'image',

            'cover' => 'cover',
            'certification_description' =>'certification_description',
            'who_this_course_is_for' =>'who_this_course_is_for',
            'price' =>'price',
            'lessons' =>'lessons',
            'duration' =>'duration',
            'access_type' =>'access_type',
            'enrolled' =>'enrolled',

            'isPublished' => 'status',
            'instructor' => 'instructor_id',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }


    public static function transformedAttribute($index)
    {
        $attributes = [
            'id'  => 'identifier',
            'name' => 'title',
            'description' => 'description',
            'image' => 'image',

            'cover' => 'cover',
            'certification_description' =>'certification_description',
            'who_this_course_is_for' =>'who_this_course_is_for',
            'price' =>'price',
            'lessons' =>'lessons',
            'duration' =>'duration',
            'access_type' =>'access_type',
            'enrolled' =>'enrolled',

            'status' => 'isPublished',
            'instructor_id' => 'instructor',
            'created_at'  => 'creationDate',
            'updated_at' => 'lastChange',
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
