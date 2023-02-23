<?php

namespace Database\Factories;

use App\Models\Red;
use App\Models\Temple;

use Illuminate\Database\Eloquent\Factories\Factory;

class RedFactory extends Factory
{
 
    protected $model = Red::class;

    public function definition()
    {     
        $name=$this->faker->unique()->word('6');
        return [
            'name'=>$name,
            'temple_id'=>Temple::all()->random()->id,
        ];
    }
}
