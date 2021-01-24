<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Imports\BooksImport;
use App\Order;
use App\Tmp;
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
        $cnt = 0;
        $genre_scores = array();
        $total = $ugs->sum('cnt');
        // GenresScoreBoard Create:
        foreach ( $ugs as $ug ){
            $score = $ug->cnt / $total;
            $cnt += $score;
            $element = [
                'genre' => $ug->genre_id ,
                'score' => $score
            ];
            array_push($genre_scores, $element);
        }
        // Read from excel
        $path = $request->file('file')->getRealPath();
        $import = new BooksImport();
        Excel::import($import, $path);

        // Calculate books Score
        $new_books = Order::all();
        foreach ($new_books as $book){
            $book_score = 0;
            $genres = $book->genres;
            $genres = explode('-',$genres);
            foreach ($genres as $genre){
                $genre = Genre::where('genre_name', $genre)->first();
                if($genre->count() != 0){
                    $index = functions::find_index($genre_scores, $genre->id);
                    if ( $index != -1 ){
                        $book_score += $genre_scores[$index]['score'];
                    }
                }
            }
            Order::find($book->id)->update(['score' => $book_score]);
        }

        // Sort book_scores array:
        $new_books = Order::all();
        for($j=0 ; $j<count($new_books) ; $j+=1) {
            for ($i = 1; $i < count($new_books); $i += 1) {
                if ($new_books[$i]->score > $new_books[$i - 1]->score) {
                    $tmp = $new_books[$i]->score;
                    $new_books[$i]->score = $new_books[$i - 1]->score;
                    $new_books[$i - 1]->score = $tmp;
                }
            }
        }

        // Empty temp table:
        Order::truncate();

        // return view!
        return view('adminPanel/show_suggestion',compact('new_books'));

    }
}
