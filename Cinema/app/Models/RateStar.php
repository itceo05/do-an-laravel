<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateStar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'film_id', 'star'];

    public function film(){
        return $this->belongsTo(Film::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function add($req){
        $rate = RateStar::create([
            'user_id'=>$req->user_id,
            'film_id'=>$req->film_id,
            'star'=>$req->star,
        ]);
        return $rate;
    }
}

