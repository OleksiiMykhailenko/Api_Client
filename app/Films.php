<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $fillable = [
        'title',
        'year',
        'director',
        'plot',
        'poster',
        'imdb_id',
        'production',
        'website'
    ];
}
