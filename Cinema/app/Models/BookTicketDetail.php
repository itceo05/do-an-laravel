<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTicketDetail extends Model
{
    use HasFactory;
    protected $fillable = ['book_ticket_id', 'time_id', 'food_id', 'chair', 'quantity', 'price'];

    
}
