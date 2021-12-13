<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'status'];
    use SoftDeletes;
    public function category_detail(){
        return $this->hasMany(CategoryDetail::class);
    }
    public function cate_film(){
        return $this->belongsToMany(Film::class, 'category_details');
    }
    public function add($request){
        $AddCate = Category::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status,
        ]);
    }

    public function edit($request, $id){
        $finbyId = Category::find($id);
        
        $EditCate = $finbyId->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status,
        ]);
    }

    public function Remove($id){
        $finbyId = Category::find($id);

        $finbyId->delete();
    }
    use HasFactory;
}
