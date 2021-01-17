<?php

namespace App\Http\Controllers\Client;

use App\User;
use Illuminate\Http\Request;
use App\Genre;
use App\Book;
use App\user_book;
use App\user_genre as UG;
use App\Book_Genre as BG;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //////////////////////////////////////////////////////// Some Controllers that no need to register or login to show!

    public function home()
    {
        $genres = Genre::with('books')->paginate(8);
        return view('home',compact('genres'));
    }

    public function singleGenre($id)
    {
        $id = intval($id);
        $genre = Genre::find($id);
        $books = $genre->books()->get();
//        dd($books);
        return view('genre_books',compact('books'));
    }

    public function book_list()
    {
        $books = Book::all();
        return view('book_list',compact('books'));
    }

}
