<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cinema extends Model
{
    protected $fillable = ['name', 'quantity_Room', 'address', 'status'];
    use SoftDeletes;
    public function add($request){
        $AddCate = Cinema::create([
            'name'=>$request->name,
            'quantity_Room'=>$request->quantity_Room,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
    }

    public function edit($request, $id){
        $finbyId = Cinema::find($id);
        
        $EditCinema = $finbyId->update([
            'name'=>$request->name,
            'quantity_Room'=>$request->quantity_Room,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
    }

    public function Remove($id){
        $finbyId = Cinema::find($id);

        $finbyId->delete();
    }
    use HasFactory;
}
