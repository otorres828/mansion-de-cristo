<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Manager as ModelsManager;
use App\Models\User;
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
        Storage::deleteDirectory('/noticias');
        Storage::deleteDirectory('/enseñanzas');
        Storage::deleteDirectory('/ministerios');
        Storage::deleteDirectory('/testimonios');
        Storage::deleteDirectory('/acercade');
        Storage::makeDirectory('/noticias');
        Storage::makeDirectory('/enseñanzas');
        Storage::makeDirectory('/ministerios');
        Storage::makeDirectory('/testimonios');
        Storage::makeDirectory('/acercade');


        $this->call(RoleSeeder::class);
        $this->call(TempleSeeder::class);
        Group::factory(8)->create();
        ModelsManager::factory(8)->create();

        $this->call(HierarchySeeder::class);

        $this->call(UserSeeder::class);
        // User::factory(20)->create();

        Contact::factory(15)->create();
        Category::factory(8)->create();
        $this->call(EmailsendSeeder::class);
        $this->call(AcercadeSeeder::class);
        $this->call(AnnounceSeeder::class);
        $this->call(TeachingSeeder::class);
        $this->call(MinistrySeeder::class);
        $this->call(TestimonySeeder::class);
        
    }
}
