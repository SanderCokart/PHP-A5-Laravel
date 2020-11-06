<?php

namespace App\Policies;

use App\Models\Band;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Band $band
     * @return mixed
     */
    public function view(User $user, Band $band)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Band $band
     * @return mixed
     */
    public function update(User $user, Band $band)
    {
        return $user->id === $band->user_id || $band->moderators()->where('moderator_id', $user->moderator->id)->exists() ?
            Response::allow() :
            Response::deny('You are not the owner or moderator of this band and are therefore not allowed to modify it.');
    }

    public function addModerators(User $user, Band $band)
    {
        return $user->id === $band->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Band $band
     * @return mixed
     */
    public function delete(User $user, Band $band)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Band $band
     * @return mixed
     */
    public function restore(User $user, Band $band)
    {
        //
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Band $band
     * @return mixed
     */
    public function forceDelete(User $user, Band $band)
    {
        //
    }
}
