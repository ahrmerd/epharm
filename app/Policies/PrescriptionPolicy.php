<?php

namespace App\Policies;

use App\Models\Prescription;
use App\Models\User;
use App\Policies\Traits\AdminPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrescriptionPolicy
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
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Prescription $prescription)
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
        return ($user->isDoctor());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Prescription $prescription)
    {
        return ($user->isDoctor() && $prescription->doctor_id == $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Prescription $prescription)
    {
        // return ($user->isDoctor());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Prescription $prescription)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Prescription $prescription)
    {
        // return ($user->isDoctor());
    }
}
