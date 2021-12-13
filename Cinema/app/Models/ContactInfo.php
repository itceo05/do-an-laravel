<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class ContactInfo extends Model
{
    protected $fillable = ['user_id' ,'email', 'phone', 'address', 'booking'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function add($request){
        $AddContactInfo = ContactInfo::create([
            'user_id'=>Auth::user()->id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
    }

    public function edit($request, $id){
        $finbyId = ContactInfo::find($id);
        $EditLogo = $finbyId->update([
            'user_id'=>Auth::user()->id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
    }

    public function Remove($id){
        $finbyId = ContactInfo::find($id);

        $finbyId->delete();
    }
    use SoftDeletes;
    use HasFactory;
}
