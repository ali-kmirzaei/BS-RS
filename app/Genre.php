<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    public $timestamps = false;
    protected $fillable = [
        'id','genre_name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book','book_genre','genre_id','book_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','user_genre','genre_id','user_id');
    }
}
