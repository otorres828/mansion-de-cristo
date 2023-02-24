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
            'anfitrion'=>$this->faker->name(),
            'ubicacion' => $this->faker->text(200),
            'dia'=>$this->faker->randomElement([1,2,3,4,5,6,7]),
            'telefono'=>$this->faker->phoneNumber(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
