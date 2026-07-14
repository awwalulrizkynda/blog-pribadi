<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $categories = Category::all();

        foreach(range(1,10) as $i){

            Article::create([

                'user_id'=>$user->id,

                'category_id'=>$categories->random()->id,

                'title'=>"Artikel Contoh $i",

                'slug'=>Str::slug("Artikel Contoh $i"),

                'content'=>str_repeat(
                    "Ini adalah isi artikel contoh ke-$i. ",
                    30
                ),

                'thumbnail'=>null,

                'status'=>'published'

            ]);

        }
    }
}