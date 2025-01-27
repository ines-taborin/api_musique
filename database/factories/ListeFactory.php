<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Liste>
 */
class ListeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(),
            'soustitre' => fake()->sentence(),
            'image' => 'https://picsum.photos/' . fake()->numberBetween(100, 500),
            'description' => fake()->paragraph(),
            'type' => Arr::random(['Artiste', 'Album', 'Chanson']),
            'verifie' => fake()->boolean(),
            'sauvegardes' => fake()->numberBetween(0, 5000),
            'visibilite' => Arr::random(['publique', 'privée']),
        ];
    }
}
