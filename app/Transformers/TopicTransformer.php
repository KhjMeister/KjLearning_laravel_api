<?php

namespace App\Transformers;

use App\Models\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
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
    public function transform(Topic $topic)
    {
        return [
            'id' => (int)$topic->id,
            'name' => (string)$topic->name,
            'description' => (string) $topic->description,
            'duration' => (string) $topic->duration,
            
            'video' => url("files/{$topic->video}"),
            'notes' => url("files/{$topic->notes}"),
            'created_at' => (string)$topic->created_at,
            'updated_at' => (string)$topic->updated_at,
            'deleted_at' => isset($topic->deleted_at) ? (string)$topic->deleted_at : null,
           
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('topics.show', $topic->id)
                ],
                [
                    'rel' => 'topics.courses',
                    'href' => route('topics.courses.index', $topic->id)
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
            'duration' => 'duration',
            
            'video' => 'video',
            'notes' => 'notes',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'deleted_at' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'duration' => 'duration',
            'video' => 'video',
            'notes' => 'notes',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'deleted_at' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
