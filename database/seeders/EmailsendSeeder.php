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
    }
}
