<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    protected $fillable = ['name', 'image', 'price', 'combo', 'status'];
    use SoftDeletes;
    public function add($request){
        $file = $request->image;
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move('Uploads', $fileName);

        $AddData = Food::create([
            'name'=>$request->name,
            'image'=>$fileName,
            'price'=>$request->price,
            'combo'=>$request->combo,
            'status'=>$request->status,
        ]);
    }

    public function edit($request, $id){
        $finbyId = Food::find($id);

        if($request->has('image')){
            $image_path = 'Uploads/'.$finbyId->image;
            unlink($image_path);

            $file = $request->image;
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('Uploads', $fileName);
        }else{
            $fileName = $finbyId->image;
        }
        
        $EditFood= $finbyId->update([
            'name'=>$request->name,
            'image'=>$fileName,
            'price'=>$request->price,
            'combo'=>$request->combo,
            'status'=>$request->status,
        ]);
    }

    public function Remove($id){
        $finbyId = Food::find($id);
        $finbyId->delete();
    }
    use HasFactory;
}
