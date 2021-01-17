<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
//    public $timestamps = false;
    protected $table = 'books';
    protected $fillable = [
        'id','book_name','author','cost','img'
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre','book_genre','book_id','genre_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','user_book','book_id','user_id');
    }
}
