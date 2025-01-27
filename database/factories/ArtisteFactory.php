<?php

namespace Database\Factories;

use App\Models\Artiste;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtisteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artiste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'image' => 'https://randomuser.me/api/portraits/men/' . fake()->numberBetween(1, 99) . '.jpg',
            'bio' => $this->faker->paragraph(),
            'abonnes' => $this->faker->numberBetween(0, 10000),
            'verifie' => $this->faker->boolean(),
        ];
    }
}
