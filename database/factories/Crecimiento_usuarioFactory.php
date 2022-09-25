<?php

namespace Database\Factories;

use App\Models\Crecimiento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crecimiento_usuario>
 */
class Crecimiento_usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'crecimiento_id' => Crecimiento::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'realizado' => $this->faker->boolean,
        ];
    }
}
