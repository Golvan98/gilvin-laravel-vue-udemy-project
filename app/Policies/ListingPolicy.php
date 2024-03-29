<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Listing;
use App\Models\User;

class ListingPolicy
{
    use HandlesAuthorization;

    public function before (?User $user, $ability)
    {
        /*if($user->is_admin && $ability === 'update'){
            return true;
        }
        This only allows an admin to update as the $ability is only set to 'update', so delete is not authorized. Where as the snippet below allows other actions for the admin
        */

        if($user?->is_admin){
            return true;
        }
        // the "?" is a null safe operator to check if user is null. it assures that accessing this property does not induce an error
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Listing $listing)
    {
        if ($listing->by_user_id === $user?->id)
        {
            return true;
        }

        return $listing->sold_at === null;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Listing $listing)
    {
        return $listing->sold_at === null && ($user->id === $listing->by_user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Listing $listing)
    {
        $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Listing $listing)
    {
        $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Listing $listing)
    {
        return $user->id === $listing->by_user_id;
    }
}
