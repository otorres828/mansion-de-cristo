<?php

namespace Database\Seeders;

use App\Models\Red;
use App\Models\Jerarquia;
use App\Models\Temple;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {

        User::create([
            'name' => 'Oliver Andres Torres Rivero',
            'email' => 'olivertorres1997@gmail.com',
            'temple_id' => Temple::first()->id,
            'red_id' => Red::all()->random()->id,
            'jerarquia_id' => Jerarquia::first()->id,
            'password' => bcrypt('26269828'),
            'email_verified_at' =>'2022-05-21 07:02:22'
        ])->assignRole('Master','Programador')->givePermissionTo('finanzas');
 
        User::create([
            'name' => 'Jesus Alfonzo',
            'email' => 'jesusalfonzo97@gmail.com',
            'temple_id' => Temple::first()->id,
            'red_id' => Red::all()->random()->id,
            'jerarquia_id' => Jerarquia::first()->id,
            'password' => bcrypt('123456'),
            'email_verified_at' =>'2022-05-21 07:02:22'

        ])->assignRole('Master')->givePermissionTo('finanzas');

 
    }
}
