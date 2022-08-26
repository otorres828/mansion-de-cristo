<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Temple;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
 
    protected $model = Group::class;

    public function definition()
    {     
        $name=$this->faker->unique()->word('6');
        return [
            'name'=>$name,
            'temple_id'=>Temple::all()->random()->id,
        ];
    }
}
