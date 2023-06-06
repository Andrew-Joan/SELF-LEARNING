<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comic;
use App\Models\User;

class ComicController extends Controller
{
    public function index()
    {
        return view('comics', [
            "comics" => Comic::all(), // :: untuk tipe static
            "active" => 'comics'
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            // dengan pakai withQueryString ini jadi pas kita pakai fitur search, paginationnya tidak error
        ]);
    }

    public function show(Comic $comic)
    {
        return view('comic', [
            "comic" => $comic,
            "active" => 'comics'
        ]);
    }
}
