<?php

namespace Database\Factories;

use App\Models\{Prescription,Drug};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medication>
 */
class MedicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prescription_id' => Prescription::factory(),
            'drug_id' => Drug::factory(),
            'dosage' => $this->faker->randomElement(['7/7', '2/52']),
            'notes' => $this->faker->sentence()
        ];
    }
}
