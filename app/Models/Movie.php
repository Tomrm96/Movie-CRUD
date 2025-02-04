<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'movies';

    protected $fillable = [
        'name',
        'genre',
        'year',
        'description',
    ];

}
