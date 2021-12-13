<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Banner extends Model
{
    protected $fillable = ['title', 'image', 'status'];
    use SoftDeletes;
    public function add($request){
        $file = $request->image;
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move('Uploads', $fileName);

        $AddData = Banner::create([
            'title'=>$request->title,
            'image'=>$fileName,
            'status'=>$request->status,
        ]);
    }

    public function edit($request, $id){
        $finbyId = Banner::find($id);

        if($request->has('image')){
            $image_path = 'Uploads/'.$finbyId->image;
            unlink($image_path);

            $file = $request->image;
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('Uploads', $fileName);
        }else{
            $fileName = $finbyId->image;
        }
        
        $EditBanner = $finbyId->update([
            'title'=>$request->title,
            'image'=>$fileName,
            'status'=>$request->status,
        ]);
    }

    public function Remove($id){
        $finbyId = Banner::find($id);
        
        $image_path = 'Uploads/'.$finbyId->image;
        unlink($image_path);

        $finbyId->delete();
    }
    use HasFactory;
}
