<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Feedback extends Model
{
    protected $fillable = ['user_id', 'content', 'status'];
    use SoftDeletes;
    use HasFactory;
}
