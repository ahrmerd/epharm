<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word(),
            'size' => $this->faker->randomElement(['200mg', '500mg', '20mg']),
            'brand' => $this->faker->randomElement(['mzor', 'sivo pharmacist', 'hanclaro', 'ugolab', 'greenfield'])
        ];
    }
}
