<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Temple;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $name=$this->faker->unique()->word('6');
        return [
            'name'=>$name,
            'temple_id'=>Temple::all()->random()->id,
        ];
    }
}
