<?php

namespace Database\Seeders;

use App\Models\Artiste;
use App\Models\Chanson;
use App\Models\Liste;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer quelques artistes
        Artiste::factory(20)->create();

        // Créer quelques utilisateurs
        Utilisateur::factory()->create([
            'prenom' => 'Utilisateur',
            'nom' => 'Test',
            'courriel' => 'test@example.com',
        ]);

        Utilisateur::factory(10)->create();

        // Créer quelques listes
        Liste::factory(20)->create();

        // Créer quelques chansons
        Chanson::factory(50)->create();

        // Associer les listes aux utilisateurs
        Liste::all()->each(function (Liste $liste) {
            $liste->utilisateurs()->sync(
                Utilisateur::all()->random(rand(1, 5))->pluck('id')
            );
        });

        // Associer les listes aux chansons
        Liste::all()->each(function (Liste $liste) {
            $liste->chansons()->sync(
                Chanson::all()->random(rand(5, 15))->pluck('id')
            );
        });
    }
}