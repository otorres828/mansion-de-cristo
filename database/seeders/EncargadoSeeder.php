<?php

namespace Database\Seeders;

use App\Models\Encargado;
use App\Models\Red;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncargadoSeeder extends Seeder
{
    protected $model = Encargado::class;

    public function run()
    {
        $redes=Red::all();
        foreach($redes as $red){
            Encargado::create([
                'temple_id'=>1,
                'red_id'=> $red->id
            ]);
        }
    }
}
