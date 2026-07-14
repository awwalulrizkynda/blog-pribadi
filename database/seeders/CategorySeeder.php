<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $categories = [
            'Laravel',
            'PHP',
            'JavaScript',
            'Database',
            'Bootstrap',
            'Teknologi'
        ];

        foreach ($categories as $category) {

            Category::create([

                'user_id' => $user->id,

                'name' => $category,

                'slug' => Str::slug($category),

                'description' => 'Kategori '.$category

            ]);

        }
    }
}