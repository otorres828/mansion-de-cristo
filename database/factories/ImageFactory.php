<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Announce;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'=>'noticias/'. $this->faker->image('public/storage/noticias',640,400,null,false)
        ];
    }
}