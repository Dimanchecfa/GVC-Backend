<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_stock' => 'STOCK-1234',
            'numero_serie' => $this->faker->randomNumber(8),
            'marque' => $this->faker->word(),
            'modele' => $this->faker->word(),
            'couleur' => $this->faker->word(),
            'statut' => 'en_stock',
        
        
        ];
    }
}
