<?php

namespace Database\Factories;

use App\Models\{User, Patient};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id' => User::factory(),
            'pharmacist_id' => User::factory(),
            'patient_id' => Patient::factory(),
            'diagnosis' => $this->faker->sentence(),
            'notes' => $this->faker->sentence()
        ];
    }
}
