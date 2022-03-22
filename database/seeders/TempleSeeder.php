<?php

namespace Database\Seeders;

use App\Models\Temple;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name='Mansion de Cristo';
        Temple::create([
            'name'=>$name,
            'slug'=>Str::slug($name),
        ]);
    }
}
