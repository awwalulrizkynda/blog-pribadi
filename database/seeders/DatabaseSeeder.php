<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([

            'name'=>'Admin',

            'email'=>'admin@gmail.com',

            'password'=>bcrypt('12345678')

        ]);

        $this->call([

            CategorySeeder::class,

            ArticleSeeder::class,

        ]);
    }
}