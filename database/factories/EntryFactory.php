<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 2, 500),
            'month' => $this->faker->month,
            'year' => 2025,
            'note' => $this->faker->sentence(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
