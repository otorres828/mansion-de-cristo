<?php

namespace Database\Seeders;

use App\Models\Jerarquia;
use App\Models\Temple;
use Illuminate\Database\Seeder;

class JerarquiaSeeder extends Seeder
{
    protected $model = Jerarquia::class;

    public function run()
    {
 
        $name='MASTER';
        Jerarquia::create([
            'name'=>$name,
            'nivel'=>'0',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='APOSTOL DE RED';
        Jerarquia::create([
            'name'=>$name,
            'nivel'=>'1',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='PASTOR DE RED';
        Jerarquia::create([
            'name'=>$name,
            'nivel'=>'2',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='PASTOR DE CELULA';
        Jerarquia::create([
            'name'=>$name,
            'nivel'=>'3',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='LIDER DE CELULA';
        Jerarquia::create([
            'name'=>$name,
            'nivel'=>'4',
            'temple_id'=>Temple::all()->random()->id,

        ]);

        $name='DISCIPULO';
        Jerarquia::create([
            'name'=>$name,
            'nivel'=>'5',
            'temple_id'=>Temple::all()->random()->id,

        ]);
    }
}
