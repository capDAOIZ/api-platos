<?php

namespace Database\Factories;

use App\Models\Plato;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatoFactory extends Factory
{
    protected $model = Plato::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'precio' => $this->faker->randomFloat(2, 5, 100),
            'foto' => 'test.jpg',  // Puedes ajustar esto según sea necesario
        ];
    }
}
