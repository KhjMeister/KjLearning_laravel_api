<?php

namespace App\Models;
// use App\\Transformers\UserTransformer;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\CourseTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    const PUBLISHED_COURSE = 'available';
    const UNPUBLISHED_COURSE = 'unavailable';
    const LIFE_TIME = 'life_time';

    public $transformer = CourseTransformer::class;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name',
        'description',
        'status',
        'instructor_id',
        'image',
        'cover',
        'certification_description',
        'who_this_course_is_for',
        'price',
        'lessons',
        'duration',
        'access_type',
        'enrolled'
        ];
    protected $hidden = [
        'pivot'
    ];


    /* 
    isPublished
    returns bool true or false
    */
    public function isPublished()
    {
        return $this->status == Course::PUBLISHED_COURSE;
    }


    /* relationships */

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }


    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
