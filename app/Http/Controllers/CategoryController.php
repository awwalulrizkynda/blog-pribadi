<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())->latest()->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name);

        if (Category::where('slug', $slug)->exists()) {
        $slug .= '-' . time();
        }

        Category::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        abort_if($category->user_id != auth()->id(),403);

        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name);

        if (
            Category::where('slug', $slug)
                ->where('id', '!=', $category->id)
                ->exists()
        ) {
            $slug .= '-' . time();
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        abort_if($category->user_id != auth()->id(),403);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success','Kategori berhasil dihapus.');
    }
}