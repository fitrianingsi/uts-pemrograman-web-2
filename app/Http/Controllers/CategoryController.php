<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
        })->latest()->paginate(5);

        return view('categories.index', compact('categories', 'search'));
    }

    public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'code' => 'required',
        'description' => 'required',
    ]);

    Category::create($validated);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Category berhasil ditambahkan');
}
}