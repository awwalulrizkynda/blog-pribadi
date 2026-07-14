<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        $totalCategory = Category::where('user_id', auth()->id())->count();

        $totalArticle = Article::where('user_id', auth()->id())->count();

        $published = Article::where('user_id', auth()->id())
            ->where('status', 'published')
            ->count();

        $draft = Article::where('user_id', auth()->id())
            ->where('status', 'draft')
            ->count();

        return view('dashboard', compact(
            'totalCategory',
            'totalArticle',
            'published',
            'draft'
        ));
    }
}