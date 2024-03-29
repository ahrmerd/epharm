<?php

namespace App\Policies;

use App\Models\Drug;
use App\Models\User;
use App\Policies\Traits\AdminPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class DrugPolicy
{
    use HandlesAuthorization, AdminPolicy;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Drug $drug)
    {
        return true;
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
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Drug $drug)
    {
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Drug $drug)
    {
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Drug $drug)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Drug $drug)
    {
        //
    }
}
