<?php

namespace App\Http\Controllers;

use App\user_book;
use Illuminate\Http\Request;
use App\Genre;
use App\Book;
use App\Book_Genre as BG;
use App\user_book as UB;
use App\user_genre as UG;

class functions extends Controller
{
    // check inputs data that are valid   %%%%%%%%%%%%%%%%%%%%%%%
    public static function sanitize($element)
    {
          for($i=0 ; $i<strlen($element) ; $i++){
              if( !( (ord($element[$i]) >=48 and ord($element[$i]) <=57) ||
                  (ord($element[$i]) >=64 and ord($element[$i]) <=90) ||
                  (ord($element[$i]) >=97 and ord($element[$i]) <=122) ||
                  (ord($element[$i]) >=128 and ord($element[$i]) <=255) ||
                  (ord($element[$i]) ==45) ||
                  (ord($element[$i]) ==95) ||
                  (ord($element[$i]) ==216) ||
                  (ord($element[$i]) ==58) ||
                  (ord($element[$i]) ==32) ) ){
                      return 1;
                  }
            }
          return 0;
    }

    // check book_user is available   %%%%%%%%%%%%%%%%%%%%%%%%%%%
    public static function is_book_user($book_id, $user_id)
    {
        if ( user_book::where('book_id',$book_id)->where('user_id',$user_id)->get() == null ){
            return false;
        }
        return true;
    }

    // match book with this genre   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    public static function matching_BG($book_id, $genre_id)
    {
        $new_data = [
            'book_id' => $book_id ,
            'genre_id' => $genre_id ,
            'next_genre_id' => 1
        ];
        $genreResult = BG::create($new_data);

        if( ! $genreResult instanceof BG ){
            Book::where('id',$book_id)->delete();
            return redirect()->back()->with('sanitiza','مشکلی رخ داده، بعدا دوباره امتحان کنید');
        }
    }

    // match user with this genres   %%%%%%%%%%%%%%%%%%%%%%%%%%%%
    public static function add_user_genre_type0($user_id, $book_id)
    {
        $genres = BG::where('book_id',$book_id)->get();
        foreach ($genres as $genre) {
            try {
                $past_data = UG::where('genre_id', $genre->genre_id)->where('user_id', $user_id)->first();
                if ($past_data == null) {
                    $new_data = [
                        'genre_id' => $genre->genre_id,
                        'user_id' => $user_id,
                        'type' => 0,
                        'cnt' => 2
                    ];
                    UG::create($new_data);
                } else {
                    $new_cnt = $past_data->cnt + 2;
                    $past_data->update(['cnt' => $new_cnt]);
                }
            } catch (\Exception $e) { // It's actually a QueryException but this works too
                continue;
            }
        }
        return 0;
    }

    public static function find_index($genres, $element)
    {
        $index = 0;
        foreach ($genres as $genre){
            if( $genre['genre'] == $element ){
                return $index;
            }
            $index += 1;
        }

        return -1;
    }

}
