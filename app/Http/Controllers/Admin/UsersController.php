<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth');
    }


    public function users()
    {
        $users = User::all();
        return view('adminPanel/users')->with(compact('users'));
    }

    public function user_books($id)
    {
        $user = User::find($id);
        $books = $user->books()->get()->all();
        $user = $user->name;
        return view('adminPanel/user_books')->with(compact('books','user'));
    }
}
