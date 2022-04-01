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
        Storage::makeDirectory('/public/announces');
        Storage::makeDirectory('/public/teachings');
        Storage::makeDirectory('/public/ministries');
        Storage::makeDirectory('/public/testimonies');
        Storage::deleteDirectory('/public/announces');
        Storage::deleteDirectory('/public/teachings');
        Storage::deleteDirectory('/public/ministries');
        Storage::deleteDirectory('/public/testimonies');


        $this->call(RoleSeeder::class);
        $this->call(TempleSeeder::class);
        Group::factory(8)->create();
        ModelsManager::factory(8)->create();

        $this->call(HierarchySeeder::class);

        $this->call(UserSeeder::class);
        User::factory(20)->create();

        Contact::factory(15)->create();
        Category::factory(8)->create();
        $this->call(AnnounceSeeder::class);
        $this->call(TeachingSeeder::class);
        $this->call(MinistrySeeder::class);
        $this->call(TestimonySeeder::class);
        




    }
}
