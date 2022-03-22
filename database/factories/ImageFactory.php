<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;
    public $search="";
    public function __construct($search)
    {
        $this->search=$search;
    }

    public function definition()
    {
        return [
            'url'=>$this->search.'/'. $this->faker->image('public/storage/'.$this->search,640,400,null,false)
        ];
    }
}
