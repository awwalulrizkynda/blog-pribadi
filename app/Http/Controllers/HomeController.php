<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Halaman Home
     */
    public function index(Request $request)
    {
        $query = Article::with('category')
            ->where('status', 'published');

        // Search artikel
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->latest()
            ->paginate(6)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('home', compact('articles', 'categories'));
    }

    /**
     * Detail Artikel
     */
    public function show($slug)
    {
        $article = Article::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('article', compact('article'));
    }
}