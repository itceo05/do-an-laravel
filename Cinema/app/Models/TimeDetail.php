<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeDetail extends Model
{
    protected $fillable = ['date', 'cinema_id', 'time_id', 'film_id', 'room_id'];

    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }
    
    public function room(){
        return $this->belongsTo(MovieRoom::class);
    }

    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function time(){
        return $this->belongsTo(Time::class);
    }

    public function add($request){
        $AddShowTime = TimeDetail::create([
            'date'=>$request->date,
            'cinema_id'=>$request->cinema_id,
            'time_id'=>$request->time_id,
            'film_id'=>$request->film_id,
            'room_id'=>$request->room_id,
        ]);      
    }

    public function edit($request, $id){
        $finbyId = TimeDetail::find($id);
        $EditShowTime= $finbyId->update([
            'date'=>$request->date,
            'cinema_id'=>$request->cinema_id,
            'time_id'=>$request->time_id,
            'film_id'=>$request->film_id,
            'room_id'=>$request->room_id,               
        ]);
    }

    public function Remove($id){
        $finbyId = TimeDetail::find($id);
        $finbyId->delete();
    }
    use HasFactory;
}
