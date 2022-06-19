<?php

namespace Database\Seeders;

use App\Models\EmailSend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailsendSeeder extends Seeder
{
  
    public function run()
    {

        EmailSend::create([
            'name'=>'Enseñanzas',
        ]);
        EmailSend::create([
            'name'=>'Noticias',
        ]);
        EmailSend::create([
            'name'=>'Testimonios',
        ]);
        //mantenimientos
        EmailSend::create([
            'name'=>'MantenimientoCasa',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoNoticias',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoEnseñanzas',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoMinisterios',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoTestimonios',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoAcercade',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoContactanos',
        ]);
        EmailSend::create([
            'name'=>'MantenimientoGeneral',
        ]);
    }
}
