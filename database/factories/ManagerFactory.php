<?php

namespace Database\Factories;

use app\Models\Red;
use App\Models\Manager;
use App\Models\Temple;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManagerFactory extends Factory
{

    protected $model = Manager::class;

    public function definition()
    {
        return [
            'red_id'=>Red::all()->random()->id,
            'temple_id'=>Temple::all()->random()->id,
        ];
    }
}
