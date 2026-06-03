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
}