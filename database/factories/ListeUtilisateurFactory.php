<?php

namespace Database\Factories;

use App\Models\Liste;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListeUtilisateurFactory extends Factory
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
            'utilisateur_id' => Utilisateur::factory(),
            'ordre' => fake()->numberBetween(1, 100),
        ];
    }
}
