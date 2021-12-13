<?php

namespace App\Models;
use App\Models\TimeDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Time extends Model
{
    protected $fillable = ['time'];
    use SoftDeletes;
    public function add($request){
        $AddTime = Time::create([
            'time'=>$request->time,
        ]);
    }

    public function edit($request, $id){
        $finbyId = Time::find($id);
        $EditTime = $finbyId->update([
            'time'=>$request->time,
        ]);
    }

    public function Remove($id){
        $finbyId = Time::find($id);
        $finbyId->delete();
    }
    use HasFactory;
}
