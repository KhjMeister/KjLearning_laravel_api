<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
        
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'identifier' => (int)$user->id,
            'name' => (string)$user->name,
            'phone' => (string)$user->phone,
            'picture' => (string)$user->picture,

            'about'=>(string)$user->about,
            'location'=>(string)$user->location,
            'company'=>(string)$user->company,
            'company_url'=>(string)$user->company_url,
            'interests'=>(string)$user->interests,
            'gender'=>(string)$user->gender,
            'fb_url'=>(string)$user->fb_url,
            'tw_url'=>(string)$user->tw_url,
            'insta_url'=>(string)$user->insta_url,
            'in_url'=>(string)$user->in_url,
            'is_email_public' =>(int)$user->is_email_public,

            'email' => (string) $user->email,
            'isVerified' => (int)$user->verified,
            'isAdmin' => ($user->admin === 'true'),
            'creationDate' => (string)$user->created_at,
            'lastChange' => (string)$user->updated_at,
            'deletedDate' => isset($user->deleted_at) ? (string)$user->deleted_at : null,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('users.show', $user->id),
                ],

            ]

        ];
    }


    public static function originalAttribute($index)
    {
        $attributes = [
            'identifier' => 'id',
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'picture' => 'picture',
            'about'=>'about',
            'location'=>'location',
            'company'=>'company',
            'company_url'=>'company_url',
            'interests'=>'interests',
            'gender'=>'gender',
            'fb_url'=>'fb_url',
            'tw_url'=>'tw_url',
            'insta_url'=>'insta_url',
            'in_url'=>'in_url',
            'is_email_public' =>'is_email_public',
            'isVerified' => 'verified',
            'isAdmin' => 'admin',
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
            'name' => 'name',
            'picture' => 'picture',
            'about'=>'about',
            'location'=>'location',
            'company'=>'company',
            'company_url'=>'company_url',
            'interests'=>'interests',
            'gender'=>'gender',
            'fb_url'=>'fb_url',
            'tw_url'=>'tw_url',
            'insta_url'=>'insta_url',
            'in_url'=>'in_url',
            'is_email_public' =>'is_email_public',
            'email' => 'email',
            'phone' => 'phone',
            'verified' => 'isVerified',
            'admin' => 'isAdmin',
            'created_at'  => 'creationDate',
            'updated_at' => 'lastChange',
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
