<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use App\Policies\Traits\AdminPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
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
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Appointment $appointment)
    {
        return ($user->isReceptionist() || $appointment->user_id == $user->id);
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
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Appointment $appointment)
    {
        return ($user->isReceptionist() || $appointment->user_id == $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Appointment $appointment)
    {
        return ($appointment->user_id == $user->id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Appointment $appointment)
    {
        return ($appointment->user_id == $user->id);
    }
}
