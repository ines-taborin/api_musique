<?php

namespace Database\Factories;

use App\Models\Artiste;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chanson>
 */
class ChansonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artiste = Artiste::inRandomOrder()->first();

        return [
            'titre' => fake()->sentence(),
            'artiste_id' => $artiste->id,
            'paroles' => fake()->realText(1000),
            'album' => fake()->sentence(),
            'datePublication' => fake()->date(),
            'duree' => fake()->numberBetween(1000, 3500),
            'lectures' => fake()->numberBetween(100, 5000),
        ];
    }
}