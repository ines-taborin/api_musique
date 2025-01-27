<?php

namespace Database\Factories;

use App\Models\Liste;
use App\Models\Chanson;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListeChansonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'liste_id' => Liste::factory(),
            'chanson_id' => Chanson::factory(),
            'ordre' => fake()->numberBetween(1, 100),
        ];
    }
}

