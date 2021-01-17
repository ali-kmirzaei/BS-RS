<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_genre extends Model
{
    protected $table = 'user_genre';
    public $timestamps = false;
    protected $fillable = [
        'genre_id' , 'user_id' , 'type' , 'cnt'
    ];
}

# type == 0 : genre from readed books
# type == 1 : liked genres
