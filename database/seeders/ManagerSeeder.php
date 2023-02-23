<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\Red;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    protected $model = Manager::class;

    public function run()
    {
        $redes=Red::all();
        foreach($redes as $red){
            Manager::create([
                'temple_id'=>1,
                'red_id'=> $red->id
            ]);
        }
    }
}
