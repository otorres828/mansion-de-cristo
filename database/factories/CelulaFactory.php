<?php

namespace Database\Factories;

use App\Models\Celula;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CelulaFactory extends Factory
{
    protected $model = Celula::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->sentence(),
            'direccion' => $this->faker->text(200),
            'fecha_hora' => $this->faker->dateTime(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
