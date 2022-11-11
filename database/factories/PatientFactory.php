<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birth_date' => $this->faker->date(),
            'blood_group' => $this->faker->randomElement(Patient::BLOODGROUPS),
            'blood_genotype' => $this->faker->randomElement(Patient::BLOODGENOTYPES),
            'gender' => $this->faker->randomElement(Patient::GENDERS),
            'phone' => '+2349012345678',
            'email' => $this->faker->email(),
            'address' => $this->faker->address()
        ];
    }
}
