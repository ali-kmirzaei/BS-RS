<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Controllers\functions;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function books()
    {
        $books = Book::all();
        return view('adminPanel/books')->with(compact('books'));
    }

    public function add_book()
    {
        $genres = Genre::all();
        return view('adminPanel/add_book',compact('genres'));
    }

    public function do_add_book(Request $request)
    {
        // validating %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        if( functions::sanitize($request->input('name')) == 1 ||
            functions::sanitize($request->input('author')) == 1 ||
            functions::sanitize($request->input('cost')) == 1 ){
            return redirect()->back()->with('sanitize', 'ورودی ها درست وارد نشده است');
        }
        $this->validate(request(),[
            'name' => 'required',
            'author' => 'required',
            'cost' => 'required',
        ],[
            'name.required' => 'نام کتاب را وارد کنید',
            'author.required' => 'نام نویسنده را وارد کنید',
            'cost.required' => 'قیمت کتاب را وارد کنید',
        ]);

        $book_name = request()->input('name');
        if( Book::where('book_name',$book_name)->first() != null ){
            return redirect()->back()->with('sanitize', 'کتاب مورد نظر شما در سیستم موجود است');
        }
        // add book %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        $new_data = [
            'book_name' => $book_name ,
            'author' => request()->input('author'),
            'cost' => request()->input('cost')
        ];
        $bookResult = Book::create($new_data);

        if( ! $bookResult instanceof Book ){
            return redirect()->back()->with('sanitiza','مشکلی رخ داده، بعدا دوباره امتحان کنید');
        }
        // match book and genre until three genre %%%%%%%%%%%%%%%%%%%%%%%%%%%%
        $book_id = $bookResult->id;


        $i = 0;
        foreach ($request->all() as $req){
            if ( $i < 4 ){
                $i += 1;
            }
            else{
                functions::matching_BG($book_id, $req);
            }
        }

        return redirect()->back()->with('success', 'کتاب جدید با موفقیت ثبت گردید');
    }
}
