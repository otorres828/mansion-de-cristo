<?php

namespace Database\Factories;

use App\Models\Testimony;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TestimonyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimony::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $autor = $this->faker->name();
        $name = $this->faker->unique()->sentence();

        return [
            'autor'=>$autor,
            'name'=>$name,
            'slug'=>Str::slug($name),
            'extract'=>$this->faker->text(250),
            'body'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
            'user_id'=>User::all()->random()->id,

        ];
    }
}
