<?php

namespace Database\Seeders;

use App\Models\Acercade;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcercadeSeeder extends Seeder
{
    public function run()
    {
        $acercade=Acercade::factory(5)->create();
        foreach($acercade as $acerca){
            Image::factory(1)->create([
                'imageable_id'=> $acerca->id,
                'imageable_type'=>Acercade::class
            ]);
        }
    }
}
