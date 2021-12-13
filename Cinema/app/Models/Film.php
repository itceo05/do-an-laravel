<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CinemaDetail;
use App\Models\CategoryDetail;
use App\Models\TimeDetail;
use App\Models\Photo;
use App\Models\FilmMaker;
class Film extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'trailer', 'time', 'release_date', 'description', 'status'];
    use SoftDeletes;

    public function photo(){
        return $this->hasMany(Photo::class);
    }

    public function film_maker(){
        return $this->hasMany(FilmMaker::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class, 'category_details');
    }

    public function cinema(){
        return $this->belongsToMany(Cinema::class, 'cinema_details');
    }

    public function cinema_time(){
        return $this->belongsToMany(Cinema::class, 'time_details');
    }

    public function time_detail(){
        return $this->hasMany(TimeDetail::class);
    }

    public function add($request){
        
        $file = $request->image;
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move('Uploads', $fileName);

        $files = $request->trailer;
        $Trailer = time().'_'.$files->getClientOriginalName();
        $files->move('Uploads', $Trailer);

        $AddFilm = Film::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image'=>$fileName,
            'trailer'=>$Trailer,
            'time'=>$request->time,
            'release_date'=>$request->release_date,
            'status'=>$request->status,
            'description'=>$request->description,
        ]);

        if($request->has('photos')){
            $files = $request->photos;
            foreach($files as $key => $value){
                $photos = time().'_'.$value->getClientOriginalName();
                $Photos = Photo::create([
                    'film_id'=>$AddFilm->id,
                    'image'=>$photos
                ]);
                $value->move(public_path('Uploads'), $photos);
            }
        }

        if($request->has('imageCrew')){
            $files = $request->imageCrew;
            foreach($files as $key => $value){
                $imageCrew = time().'_'.$value->getClientOriginalName();
                $Crews = $request->crew;
                $AsCrews = $request->asCrew;
                $AddCrew = FilmMaker::create([
                    'type'=>1,
                    'name'=>$Crews[$key],
                    'image'=>$imageCrew,
                    'as'=>$AsCrews[$key],
                    'film_id'=>$AddFilm->id
                ]);       
                $value->move(public_path('Uploads'), $imageCrew);
            }
        }
        
        if($request->has('imageCast')){
            $files = $request->imageCast;
            foreach($files as $key => $value){
                $imageCast = time().'_'.$value->getClientOriginalName();
                $Casts = $request->cast;
                $AsCasts = $request->asCast;
                
                $AddCast = FilmMaker::create([
                    'type'=>2,
                    'name'=>$Casts[$key],
                    'image'=>$imageCast,
                    'as'=>$AsCasts[$key],
                    'film_id'=>$AddFilm->id
                ]);

                $value->move(public_path('Uploads'), $imageCast);
            }
        }
        
        if($request->has('cinema_id')){
            $Cinema = $request->cinema_id;
            foreach($Cinema as $key => $value){
                $Cinemas = CinemaDetail::create([
                    'cinema_id'=>$value,
                    'film_id'=>$AddFilm->id,
                ]);
            }
        }

        if($request->has('category_id')){
            $Category = $request->category_id;
            foreach($Category as $key => $value){
                $Categories = CategoryDetail::create([
                    'category_id'=>$value,
                    'film_id'=>$AddFilm->id,
                ]);
            }
        }
        
    }

    public function edit($request, $id){
        $finbyId = Film::find($id);
        if($request->has('image')){
            $file = $request->image;
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('Uploads', $fileName);
            $image_path = 'Uploads/'.$finByid->image;
            unlink($image_path);
        }else{
            $fileName = $finbyId->image;
        }

        if($request->has('trailer')){
            $files = $request->trailer;
            $Trailer = time().'_'.$files->getClientOriginalName();
            $files->move('Uploads', $Trailer);
            $trailer_path = 'Uploads/'.$finByid->trailer;
            unlink($trailer_path);
        }else{
            $Trailer = $finbyId->trailer;
        }

        $EditFilm = $finbyId->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image'=>$fileName,
            'trailer'=>$Trailer,
            'time'=>$request->time,
            'release_date'=>$request->release_date,
            'status'=>$request->status,
            'description'=>$request->description,
        ]);

        if($request->has('photos')){
            $Photos = Photo::where('film_id', $id)->get();
            foreach($Photos as $key => $value){
                $images_path = 'Uploads/'.$value->image;
                $value->delete();
                if(file_exists($images_path)){
                    unlink($images_path);
                }
            }

            $files = $request->photos;
            foreach($files as $key => $value){
                $photos = time().'_'.$value->getClientOriginalName();
                $PhotosU = Photo::create([
                    'film_id'=>$finbyId->id,
                    'image'=>$photos
                ]);
                $value->move(public_path('Uploads'), $photos);
            }
        }

        $Flag = 0;
        $listCrew = $request->crew;
        $CrewOfFilm = FilmMaker::where('film_id', $id)->where('type', 1)->get();
        $CountCrew = FilmMaker::where('film_id', $id)->where('type', 1)->count();
        foreach($listCrew as $key => $value){
            if($request->has('imageCrew')){
                $files = $request->imageCrew;
                foreach($files as $keyImage => $value){
                    if($key == $keyImage){
                        $imageCrew = time().'_'.$value->getClientOriginalName();
                        $Crews = $request->crew;
                        $AsCrews = $request->asCrew;
                        $AddCrew = FilmMaker::create([
                            'type'=>1,
                            'name'=>$Crews[$key],
                            'image'=>$imageCrew,
                            'as'=>$AsCrews[$key],
                            'film_id'=>$id
                        ]);       
                        $value->move(public_path('Uploads'), $imageCrew);
                    }else{
                        $Crews = $request->crew;
                        $AsCrews = $request->asCrew;
                        $editImageCrew = $request->editImageCrew;
                        $AddCrew = FilmMaker::create([
                                'type'=>1,
                                'name'=>$Crews[$key],
                                'image'=>$editImageCrew[$key],
                                'as'=>$AsCrews[$key],
                                'film_id'=>$id
                        ]); 
                    }
                }
            }else{
                $Crews = $request->crew;
                $AsCrews = $request->asCrew;
                $editImageCrew = $request->editImageCrew;
                $AddCrew = FilmMaker::create([
                        'type'=>1,
                        'name'=>$Crews[$key],
                        'image'=>$editImageCrew[$key],
                        'as'=>$AsCrews[$key],
                        'film_id'=>$id,
                ]);
            }
        }

        foreach($CrewOfFilm as $value){
            // $image_path = 'Uploads/'.$value['image'];
            // unlink($image_path);
            $value->delete();
        }    
        
        $listCast = $request->cast;
        $CastOfFilm = FilmMaker::where('film_id', $id)->where('type', 2)->get();
        $CountCast = FilmMaker::where('film_id', $id)->where('type', 2)->count();
        foreach($listCast as $key => $value){
            if($request->has('imageCast')){
                $files = $request->imageCast;
                foreach($files as $keyImage => $value){
                    if($key == $keyImage){
                        $imageCast = time().'_'.$value->getClientOriginalName();
                        $Casts = $request->cast;
                        $AsCasts = $request->asCast;
                        $AddCast = FilmMaker::create([
                            'type'=>2,
                            'name'=>$Casts[$key],
                            'image'=>$imageCast,
                            'as'=>$AsCasts[$key],
                            'film_id'=>$id
                        ]);       
                        $value->move(public_path('Uploads'), $imageCast);
                    }else{
                        $Casts = $request->cast;
                        $AsCasts = $request->asCast;
                        $editImageCast = $request->editImageCast;
                        $AddCrew = FilmMaker::create([
                            'type'=>2,
                            'name'=>$Casts[$key],
                            'image'=>$editImageCast[$key],
                            'as'=>$AsCasts[$key],
                            'film_id'=>$id
                        ]); 
                    }
                }
            }else{
                $Casts = $request->cast;
                $AsCasts = $request->asCast;
                $editImageCast = $request->editImageCast;
                $AddCrew = FilmMaker::create([
                        'type'=>2,
                        'name'=>$Casts[$key],
                        'image'=>$editImageCast[$key],
                        'as'=>$AsCasts[$key],
                        'film_id'=>$id
                ]);
            }
        }
        
        foreach($CastOfFilm as $value){
            // $image_path = 'Uploads/'.$value['image'];
            // unlink($image_path);
            $value->delete();
        }
        

        if($request->has('cinema_id')){
            $Cinema = CinemaDetail::where('film_id', $id)->get();
            foreach($Cinema as $key => $value){
                $value->where('film_id', $id)->delete();
            }

            $CinemaU = $request->cinema_id;
            foreach($CinemaU as $key => $value){
                $Cinemas = CinemaDetail::create([
                    'cinema_id'=>$value,
                    'film_id'=>$finbyId->id,
                ]);
            }
        }

        if($request->has('category_id')){
            $Category = CategoryDetail::where('film_id', $id)->get();
            foreach($Category as $key => $value){
                $value->where('film_id', $id)->delete();
            }

            $CategoryU = $request->category_id;
            foreach($CategoryU as $key => $value){
                $Categories = CategoryDetail::create([
                    'category_id'=>$value,
                    'film_id'=>$finbyId->id,
                ]);
            }
        }
        // if($request->has('room_id')){

        //     $Rooms = TimeDetail::where('film_id', $id)->get();
        //     foreach($Rooms as $key => $value){
        //         $value->where('film_id', $id)->delete();
        //     }

        //     $TimeDetailU = $request->room_id;
        //     foreach($TimeDetailU as $key => $value){
        //         $TimeDetail = TimeDetail::create([
        //             'time_id'=>$request->time_id,
        //             'film_id'=>$id,
        //             'room_id'=>$value,
        //         ]);
        //     }
        // }

    }

    public function Remove($id){
        $finbyId = Film::find($id);
        $finbyId->delete();
    }

    use HasFactory;
}