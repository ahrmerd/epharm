<?php

namespace App\Policies;

use App\Models\Medication;
use App\Models\User;
use App\Policies\Traits\AdminPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicationPolicy
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
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Medication $medication)
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
        return $user->isPharmacist();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Medication $medication)
    {
        return $medication->prescription->pharmacist_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Medication $medication)
    {
        return $medication->prescription->pharmacist_id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Medication $medication)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Medication $medication)
    {
        return $medication->prescription->pharmacist_id == $user->id;
    }
}
