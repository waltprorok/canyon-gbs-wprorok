<?php

namespace Database\Factories;

use App\Models\Advisor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Advisor>
 */
class AdvisorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
