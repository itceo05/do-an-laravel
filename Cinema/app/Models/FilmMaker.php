<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmMaker extends Model
{
    protected $fillable = ['type', 'name', 'image', 'as', 'film_id'];
    use HasFactory;
}
