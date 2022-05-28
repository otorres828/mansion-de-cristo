<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Teaching;
use Illuminate\Database\Seeder;

class TeachingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachings=Teaching::factory(10)->create();
        foreach($teachings as $teaching){
            Image::factory(1)->create([
                'imageable_id'=> $teaching->id,
                'imageable_type'=>Teaching::class
            ]);
        }
    }
}
