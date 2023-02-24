<?php

namespace Database\Factories;

use App\Models\CelulasEvangelistica;
use App\Models\User;
use App\Models\VisitaPendiente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visita>
 */
class VisitaPendienteFactory extends Factory
{
    protected $model =VisitaPendiente::class;
    
    public function definition()
    {
        return [
            'observaciones'=>$this->faker->sentence(),
            'fecha'=>$this->faker->dateTime(),
            'estatus'=>$this->faker->randomElement([VisitaPendiente::NOVISITADO,VisitaPendiente::VISITADO]),
            'user_id'=>User::all()->random()->id,
            'celula_id'=>CelulasEvangelistica::all()->random()->id,
        ];
    }
}
