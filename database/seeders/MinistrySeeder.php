<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Ministry;
use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ministries=Ministry::factory(10)->create();
        foreach($ministries as $ministry){
            Image::factory(1)->create([
                'imageable_id'=> $ministry->id,
                'imageable_type'=>Ministry::class
            ]);
        }
    }
}
