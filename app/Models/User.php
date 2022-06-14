<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    static $user_types = ['doctor' => 1, 'pharmacist' => 2, 'receptionist' => 3];

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
        if ($this->user_type == $this->user_types['doctor']) {
            return $this->hasMany(Prescription::class, 'doctor_id');
        } else if ($this->user_type == $this->user_types['pharmacist']) {
            return $this->hasMany(Prescription::class, 'pharmacist_id');
        } else {
            return null;
        }
    }

    public function scopeDoctors(Builder $query)
    {
        $query->where('user_type', '=', $this->user_types['doctor']);
    }

    public function scopePharmacist(Builder $query)
    {
        $query->where('user_type', '=', $this->user_types['pharmacist']);
    }

    public function scopeReceptionist(Builder $query)
    {
        $query->where('user_type', '=', $this->user_types['receptionist']);
    }

    public function isDoctor()
    {
        return $this->user_type == $this->user_types['doctor'];
    }

    public function isPharmacist()
    {
        return $this->user_type == $this->user_types['pharmacist'];
    }

    public function isReceptionist()
    {
        return $this->user_type == $this->user_types['receptionist'];
    }
}
