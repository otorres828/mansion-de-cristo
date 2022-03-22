<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Hierarchy;
use App\Models\Temple;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name'=>'Oliver Andres Torres Rivero',
            'email'=>'olivertorres1997@gmail.com',
            'temple_id'=>Temple::first()->id,
            'group_id'=>Group::all()->random()->id, 
            'hierarchy_id'=>Hierarchy::first()->id,
            'password'=>bcrypt('26269828')
        ])->assignRole('Master','Admin Blog');

    }
}
