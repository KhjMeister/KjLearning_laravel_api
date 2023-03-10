<?php

namespace App\Policies;

use App\Traits\AdminActions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization, AdminActions;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $authenticatedUser, User $user)
    {
        //make sure a user cannot be deleted using any client except it be a tokne accessed from the web version of our api 
        return $authenticatedUser->id === $user->id && $authenticatedUser->token()->client->personal_access_client;
    }

    //

}
