<?php

namespace Database\Factories;

use App\Models\{Appointment, User, Patient};
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Expr\Cast\Array_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'user_id' => User::factory(),
            'status' => Appointment::APPOINTMENT_STATUSES[array_rand(Appointment::APPOINTMENT_STATUSES)],
            'date_time' => $this->faker->dateTime(),
            'reason' => $this->faker->sentence(),
        ];
    }
}
