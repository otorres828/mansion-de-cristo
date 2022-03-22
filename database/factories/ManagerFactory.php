<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Manager;
use App\Models\Temple;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id'=>Group::all()->random()->id,
            'temple_id'=>Temple::all()->random()->id,
        ];
    }
}
