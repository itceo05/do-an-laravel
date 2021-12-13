<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reviews extends Model
{
    protected $fillable = ['film_id', 'user_id', 'content', 'status'];
    use SoftDeletes;
    use HasFactory;

    public function film(){
        return $this->belongsTo(Film::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function add($user_id, $req){
        $review = Reviews::create([
            'film_id'=>$req->film_id,
            'content'=>$req->mess,
            'user_id'=>$user_id,
        ]);
        return $review;
    }
}
