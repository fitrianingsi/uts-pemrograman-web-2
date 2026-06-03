<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /** @use HasFactory<\Database\Factories\FilmFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'director',
        'release_date',
        'duration',
        'synopsis',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
