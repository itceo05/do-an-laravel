<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaDetail extends Model
{
    protected $fillable = ['cinema_id', 'film_id'];
    use HasFactory;
}
