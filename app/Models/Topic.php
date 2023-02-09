<?php

namespace App\Models;
use App\Transformers\TopicTransformer;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $transformer = TopicTransformer::class;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description', 'video', 'notes'];

    protected $hidden = [
        'pivot'
    ];



    /* relationships */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
