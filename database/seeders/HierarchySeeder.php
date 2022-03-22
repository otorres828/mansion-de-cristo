<?php

namespace Database\Seeders;

use App\Models\Hierarchy;
use App\Models\Temple;
use Illuminate\Database\Seeder;

class HierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $name='MASTER';
        Hierarchy::create([
            'name'=>$name,
            'nivel'=>'0',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='APOSTOL DE RED';
        Hierarchy::create([
            'name'=>$name,
            'nivel'=>'1',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='PASTOR DE RED';
        Hierarchy::create([
            'name'=>$name,
            'nivel'=>'2',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='PASTOR DE CELULA';
        Hierarchy::create([
            'name'=>$name,
            'nivel'=>'3',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='LIDER DE CELULA';
        Hierarchy::create([
            'name'=>$name,
            'nivel'=>'4',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='DISCIPULO';
        Hierarchy::create([
            'name'=>$name,
            'nivel'=>'5',
            'temple_id'=>Temple::all()->random()->id,

        ]);
    }
}
