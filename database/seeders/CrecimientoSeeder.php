<?php

namespace Database\Seeders;

use App\Models\Crecimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrecimientoSeeder extends Seeder
{

    public function run()
    {
        $crecimiento = Crecimiento::factory(10)->create();
    }
}
