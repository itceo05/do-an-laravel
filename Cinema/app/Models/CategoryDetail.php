<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    protected $fillable = ['category_id', 'film_id'];
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    use HasFactory;

}
