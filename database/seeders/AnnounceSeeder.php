<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Announce;
use Illuminate\Database\Seeder;

class AnnounceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announces=Announce::factory(20)->create();
        foreach($announces as $announce){
            Image::factory(1)->create([
                'imageable_id'=> $announce->id,
                'imageable_type'=>Announce::class
            ]);
        }
    }
}
