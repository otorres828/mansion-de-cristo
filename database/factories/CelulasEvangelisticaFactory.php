<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CelulasEvangelistica;
use App\Models\User;

class CelulasEvangelisticaFactory extends Factory
{
    protected $model = CelulasEvangelistica::class;

    public function definition()
    {
        return [
            'anfitrion'=>$this->faker->name(),
            'ubicacion'=>$this->faker->sentence(),
            'telefono'=>$this->faker->phoneNumber(),
            'user_id'=>User::all()->random()->id,
        ];
    }
}
