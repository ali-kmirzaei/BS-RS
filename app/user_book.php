<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_book extends Model
{
    protected $table = 'user_book';
    protected $fillable = [
        'book_id','user_id'
    ];
}
