<?php

namespace Database\Factories;

use App\Models\Acercade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AcercadeFactory extends Factory
{
    protected $model = Acercade::class;


    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'body'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
        ];
    }
}
