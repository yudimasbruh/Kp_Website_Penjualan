<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'yudi',
            'username' => 'yudimasbruh',
            'email' => 'yudi@gmail.com',
            'password' => '123456qwe'
        ]);
    }
}
