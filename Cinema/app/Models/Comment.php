<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    protected $fillable = ['blog_id', 'user_id', 'content', 'status'];
    use SoftDeletes;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
