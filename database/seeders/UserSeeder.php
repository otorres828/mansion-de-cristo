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
            'name' => 'Oliver Andres Torres Rivero',
            'email' => 'olivertorres1997@gmail.com',
            'temple_id' => Temple::first()->id,
            'group_id' => Group::all()->random()->id,
            'hierarchy_id' => Hierarchy::first()->id,
            'password' => bcrypt('26269828'),
            'email_verified_at' =>'2022-05-21 07:02:22'
        ])->assignRole('Master','Programador');
        User::create([
            'name' => 'Jesus Alfonzo',
            'email' => 'jesusalfonzo97@gmail.com',
            'temple_id' => Temple::first()->id,
            'group_id' => Group::all()->random()->id,
            'hierarchy_id' => Hierarchy::first()->id,
            'password' => bcrypt('123456')
        ])->assignRole('Master');
        User::create([
            'name' => 'Carmen Arenas',
            'email' => 'arenasduque.ca@gmail.com',
            'temple_id' => 1,
            'group_id' => 1,
            'hierarchy_id' => 3,
            'password' => bcrypt('123456'),
            'email_verified_at' =>'2022-05-21 07:02:22'
        ])->assignRole('Admin Blog');
        User::create([
            'name' => 'Cesar Sotillo',
            'email' => 'cesarsotillo34@gmail.com',
            'temple_id' => 1,
            'group_id' => 1,
            'hierarchy_id' => 3,
            'password' => bcrypt('123456'),
            'email_verified_at' =>'2022-05-21 07:02:22'
        ])->assignRole('Admin Blog');
    }
}
