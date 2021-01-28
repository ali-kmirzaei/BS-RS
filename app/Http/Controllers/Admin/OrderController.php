<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Controllers\functions;
use App\Http\Controllers\suggestion_func;
use App\Imports\BooksImport;
use App\Order;
use App\user_genre as UG;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth');
    }


    public function suggestion()
    {
        return view('adminPanel/suggestion');
    }

    public function do_suggestion(Request $request)
    {
        // set genres scores
        $ugs = UG::all();

        // GenresScoreBoard Create:
        $genre_scores = suggestion_func::create_genre_score_borad($ugs);

        // Read from excel
        $path = $request->file('file')->getRealPath();
        $import = new BooksImport();
        Excel::import($import, $path);

        // Calculate books Score
        suggestion_func::calculate_books_score_admin($genre_scores);

        // Sort book_scores array:
        $new_books = Order::all();
        $new_books = suggestion_func::books_sort_admin($new_books);

        // Empty temp table:
        Order::truncate();

        // return view!
        return view('adminPanel/show_suggestion',compact('new_books'));

    }
}
