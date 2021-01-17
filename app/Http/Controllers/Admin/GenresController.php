<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenresController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth');
    }


    public function genres()
    {
        $genres = Genre::all();
        return view('adminPanel/genres')->with(compact('genres'));
    }

    public function genre_books($id)
    {
        $genre = Genre::find($id);
        $books = $genre->books()->get()->all();
        $genre = $genre->genre_name;
        return view('adminPanel/genre_books')->with(compact('books','genre'));
    }
}
