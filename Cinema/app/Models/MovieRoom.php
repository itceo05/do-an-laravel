<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MovieRoom extends Model
{
    protected $fillable = ['name', 'quantity_Chair'];
    use SoftDeletes;
    public function add($request){
        $AddData = MovieRoom::create([
            'name'=>$request->name,
            'quantity_Chair'=>$request->quantity_Chair,
        ]);
    }

    public function edit($request, $id){
        $finbyId = MovieRoom::find($id);

        $EditChair = $finbyId->update([
            'name'=>$request->name,
            'quantity_Chair'=>$request->quantity_Chair,
        ]);
    }

    public function Remove($id){
        $finbyId = MovieRoom::find($id);
        $finbyId->delete();
    }

    use HasFactory;
}
