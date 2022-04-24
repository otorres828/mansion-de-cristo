<?php

namespace Database\Factories;

use App\Models\Announce;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnnounceFactory extends Factory
{

    protected $model = Announce::class;

  
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'extract'=>$this->faker->text(250),
            'body'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
            'user_id'=>User::all()->random()->id,

        ];
    }
}
