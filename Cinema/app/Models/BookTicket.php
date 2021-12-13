<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CinemaDetail;
use App\Models\CategoryDetail;
use App\Models\TimeDetail;
use App\Models\Cinema;
use App\Models\User;

class BookTicket extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['user_id', 'payment', 'amount', 'price', 'status'];

    public function book_ticket_detail(){
        return $this->hasMany(BookTicketDetail::class);
    }
}
