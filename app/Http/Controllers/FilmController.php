<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $categoryId = $request->category_id;

        $categories = Category::all();

        $films = Film::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('director', 'like', "%{$search}%");
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(5);

        return view('films.index', compact(
            'films',
            'categories',
            'search',
            'categoryId'
        ));
    }

    public function create()
    {
        $categories = Category::all();

        return view('films.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'director' => 'required',
            'release_date' => 'required',
            'duration' => 'required',
            'synopsis' => 'required',
        ]);

        Film::create($validated);

        return redirect()
            ->route('films.index')
            ->with('success', 'Film berhasil ditambahkan');
    }

    public function edit(Film $film)
{
    $categories = Category::all();

    return view('films.edit', compact(
        'film',
        'categories'
    ));
}

public function update(Request $request, Film $film)
{
    $validated = $request->validate([
        'category_id' => 'required',
        'title' => 'required',
        'director' => 'required',
        'release_date' => 'required',
        'duration' => 'required',
        'synopsis' => 'required',
    ]);

    $film->update($validated);

    return redirect()
        ->route('films.index')
        ->with('success', 'Film berhasil diubah');
}
}
