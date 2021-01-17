<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmp extends Model
{
    public $timestamps = false;
    protected $table = 'tmp';
    protected $fillable = [
        'name','genres','cost','author','score'
    ];
}
