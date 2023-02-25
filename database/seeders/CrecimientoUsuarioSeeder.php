<?php

namespace Database\Seeders;

use App\Models\Crecimiento_usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrecimientoUsuarioSeeder extends Seeder
{

    public function run()
    {
        $crecimiento = Crecimiento_usuario::factory(10)->create();
    }
}
