<?php

namespace App\Http\Controllers;

use App\Order;
use App\user_book;
use Illuminate\Http\Request;
use App\Genre;
use App\Book;
use App\Book_Genre as BG;
use App\user_book as UB;
use App\user_genre as UG;

class suggestion_func extends Controller
{

    public static function create_genre_score_borad($ugs)
    {
        $genre_scores = array();
        $cnt = 0;
        $total = $ugs->sum('cnt');

        foreach ( $ugs as $ug ){
            $score = $ug->cnt / $total;
            $cnt += $score;
            $flag = 0;
            foreach ($genre_scores as $genre_score){
                if( $ug->genre_id == $genre_score['genre'] ){
                    $genre_score['score'] *= 2;
                    $flag = 1;
                    break;
                }
            }
            if( $flag == 0 ){
                $element = [
                    'genre' => $ug->genre_id ,
                    'score' => $score
                ];
                array_push($genre_scores, $element);
            }
        }
        return $genre_scores;
    }

    public static function calculate_books_score_admin($genre_scores)
    {
        $new_books = Order::all();
        foreach ($new_books as $book){
            $book_score = 0;
            $genres = $book->genres;
            $genres = explode('-',$genres);
            foreach ($genres as $genre){
                $genre = Genre::where('genre_name', $genre)->first();
                if($genre != NULL){
                    $index = functions::find_index($genre_scores, $genre->id);
                    if ( $index != -1 ){
                        $book_score += $genre_scores[$index]['score'];
                    }
                }
            }
            Order::find($book->id)->update(['score' => $book_score]);
        }
        return true;
    }

    public static function calculate_books_score($books, $genre_scores)
    {
        $book_scores = array();
        foreach ($books as $book){
            $genres = $book->genres()->get();
            $score = 0;
            foreach ($genres as $genre){
                foreach ($genre_scores as $genre_score){
                    if ( $genre->id == $genre_score['genre'] ){
                        $score += $genre_score['score'];
                    }
                }
            }
            if ($score > 0){
                $element = [
                    'book' => $book ,
                    'score' => $score
                ];
                array_push($book_scores, $element);
            }
        }
        return $book_scores;
    }

    public static function books_sort_admin($new_books)
    {
        for($j=0 ; $j<count($new_books) ; $j+=1) {
            for ($i = 1; $i < count($new_books); $i += 1) {
                if ($new_books[$i]->score > $new_books[$i - 1]->score) {
                    $tmp = $new_books[$i]->score;
                    $new_books[$i]->score = $new_books[$i - 1]->score;
                    $new_books[$i - 1]->score = $tmp;
                }
            }
        }
        return $new_books;
    }

    public static function books_sort($book_scores)
    {
        for($j=0 ; $j<count($book_scores) ; $j+=1) {
            for ($i = 1; $i < count($book_scores); $i += 1) {
                if ($book_scores[$i]['score'] > $book_scores[$i - 1]['score']) {
                    $tmp = $book_scores[$i]['score'];
                    $book_scores[$i]['score'] = $book_scores[$i - 1]['score'];
                    $book_scores[$i - 1]['score'] = $tmp;
                }
            }
        }
        return $book_scores;
    }

}
