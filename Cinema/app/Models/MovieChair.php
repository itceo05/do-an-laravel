<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MovieChair extends Model
{
    protected $fillable = ['name', 'price'];
    use SoftDeletes;
    public function add($request){
        $AddData = MovieChair::create([
            'name'=>$request->name,
            'price'=>$request->price,
        ]);
    }

    public function edit($request, $id){
        $finbyId = MovieChair::find($id);

        $EditChair = $finbyId->update([
            'price'=>$request->price,
        ]);
    }

    public function Remove($id){
        $finbyId = MovieChair::find($id);
        $finbyId->delete();
    }
    use HasFactory;
}
