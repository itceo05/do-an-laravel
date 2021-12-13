<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'content', 'status'];
    use SoftDeletes;

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function add($request){
        $file = $request->image;
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move('Uploads', $fileName);

        $AddData = Blog::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'image'=>$fileName,
            'content'=>$request->content,
            'status'=>$request->status,
        ]);
    }

    public function edit($request, $id){
        $finbyId = Blog::find($id);

        if($request->has('image')){
            $image_path = 'Uploads/'.$finbyId->image;
            unlink($image_path);

            $file = $request->image;
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('Uploads', $fileName);
        }else{
            $fileName = $finbyId->image;
        }
        
        $EditBlog = $finbyId->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'image'=>$fileName,
            'content'=>$request->content,
            'status'=>$request->status,
        ]);
    }

    public function Remove($id){
        $finbyId = Blog::find($id);
        $finbyId->delete();
    }
    use HasFactory;
}
