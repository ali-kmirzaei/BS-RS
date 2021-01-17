<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_Genre extends Model
{
    public $timestamps = false;
    protected $table = 'book_genre';
    protected $fillable = [
        'book_id','genre_id'
    ];
}
