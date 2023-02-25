<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
  
    public function run()
    {
        $testimonies=Testimony::factory(10)->create();
        foreach($testimonies as $testimony){
            Image::factory(1)->create([
                'imageable_id'=> $testimony->id,
                'imageable_type'=>Testimony::class
            ]);
        }
    }
}
