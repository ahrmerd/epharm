<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Appointment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTimeLatest(Builder $query)
    {
        $query->orderBy('date_time', 'DESC');
    }

    public function scopeActive(Builder $query)
    {
        $query->where('status', $this::APPOINTMENT_STATUSES['active']);
    }

    public function getAppointmentStatus()
    {
        return array_flip($this::APPOINTMENT_STATUSES)[$this->status];
    }

    const APPOINTMENT_STATUSES = ['active' => 1, 'cancelled' => 2, 'postponed' => 3, 'fulfilled' => 4];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
