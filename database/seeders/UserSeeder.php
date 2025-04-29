<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([

            'name' => 'Efe Gürkan',
            'email' => 'efegurkans1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token'=> Str::random(10),

         ]);

        User::factory(10)->create();
    }
}
