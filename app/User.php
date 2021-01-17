<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];



    public function books()
    {
        return $this->belongsToMany('App\Book','user_book','user_id','book_id');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre','user_genre','user_id','genre_id');
    }

//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }

//    public function isAdmin()
//    {
//        return $this->admin; // this looks for an admin column in your users table
//    }

}
