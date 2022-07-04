<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const USER_TYPES = ['doctor' => 1, 'pharmacist' => 2, 'receptionist' => 3];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function prescriptions()
    {
        if ($this->isDoctor()) {
            return $this->hasMany(Prescription::class, 'doctor_id');
        } else if ($this->isPharmacist()) {
            return $this->hasMany(Prescription::class, 'pharmacist_id');
        } else {
            return Prescription::query();
            // return new HasMany($this->newQuery(), Prescription::class, '', '');
        }
    }
    public function scopeDoctors(Builder $query)
    {
        $query->where('user_type', '=', $this::USER_TYPES['doctor']);
    }

    public function scopePharmacist(Builder $query)
    {
        $query->where('user_type', '=', $this::USER_TYPES['pharmacist']);
    }

    public function scopeReceptionist(Builder $query)
    {
        $query->where('user_type', '=', $this::USER_TYPES['receptionist']);
    }

    public function isDoctor()
    {
        return $this->user_type == $this::USER_TYPES['doctor'];
    }

    public function isDoctorOrPharmacist()
    {
        return $this->isDoctor() || $this->isPharmacist();
    }

    public function getUserType()
    {
        return array_flip($this::USER_TYPES)[$this->user_type];
    }


    public function isPharmacist()
    {
        return $this->user_type == $this::USER_TYPES['pharmacist'];
    }

    public function isReceptionist()
    {
        return $this->user_type == $this::USER_TYPES['receptionist'];
    }
}
