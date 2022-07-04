<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    const GENDERS = ['male' => 'male', 'female' => 'female'];
    const BLOODGROUPS = ['O+' => 'O+', 'A+' => 'A+', 'B+' => 'B+', 'AB+' => 'AB+', 'O-' => 'O-', 'A-' => 'A-', 'B-' => 'B-', 'AB-' => 'AB-'];
    const BLOODGENOTYPES = ['AA' => 'AA', 'AS' => 'AS', 'AC' => 'AC', 'SS' => 'SS', 'SC' => 'SC'];


    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }



    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
