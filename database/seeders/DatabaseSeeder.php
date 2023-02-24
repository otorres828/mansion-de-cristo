<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Celula;
use App\Models\CelulasEvangelistica;
use App\Models\Contact;
use App\Models\Crecimiento;
use App\Models\Crecimiento_usuario;
use App\Models\Red;
use App\Models\Encargado;
use App\Models\User;
use App\Models\VisitaPendiente;
use Database\Factories\CrecimientoUsuarioFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('/enseñanzas');
        Storage::disk('public')->deleteDirectory('/noticias');
        Storage::disk('public')->deleteDirectory('/ministerios');
        Storage::disk('public')->deleteDirectory('/testimonios');
        Storage::disk('public')->deleteDirectory('/acercade');
        Storage::disk('public')->makeDirectory('/noticias');
        Storage::disk('public')->makeDirectory('/enseñanzas');
        Storage::disk('public')->makeDirectory('/ministerios');
        Storage::disk('public')->makeDirectory('/testimonios');
        Storage::disk('public')->makeDirectory('/acercade');


        $this->call(RoleSeeder::class);
        $this->call(TempleSeeder::class);
        Red::factory(8)->create();
        $this->call(EncargadoSeeder::class);

        $this->call(JerarquiaSeeder::class);

        $this->call(UserSeeder::class);
        User::factory(1)->create();

        // Contact::factory(15)->create();
        Category::factory(8)->create();
        $this->call(EmailsendSeeder::class);
        // $this->call(AcercadeSeeder::class);
        // $this->call(AnnounceSeeder::class);
        // $this->call(TeachingSeeder::class);
        // $this->call(MinistrySeeder::class);
        // $this->call(TestimonySeeder::class);
        Celula::factory(50)->create();
        Crecimiento::factory(50)->create();
        CelulasEvangelistica::factory(15)->create();
        VisitaPendiente::factory(100)->create();
    }
}
