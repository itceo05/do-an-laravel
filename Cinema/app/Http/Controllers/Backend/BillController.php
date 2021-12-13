<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BookTicket;
use App\Models\Food;
use App\Models\User;
use App\Models\Film;
use App\Models\Time;
use App\Models\MovieRoom;
use App\Models\MovieChair;
use App\Models\TimeDetail;
use App\Models\Cinema;
use App\Models\ContactInfo;
use App\Models\BookTicketDetail;
use Carbon\Carbon;
use Str;

class BillController extends Controller
{
    public function index(){
        $BookingDate = [];
        $listData = BookTicket::join('users', 'users.id', '=', 'book_tickets.user_id')
                                ->select('book_tickets.*', 'users.name')
                                ->get();
        foreach($listData as $value){
            $dts = $value->created_at->addHours(7)->toDayDateTimeString();
            array_push($BookingDate, $dts);
        }        
        return view('back-end.manage.bill.index', compact('listData', 'BookingDate'));
    }

    public function bill_Detail($id){
        $Flag = 0;
        $type = [];
        $book = BookTicket::find($id);
        $listData = BookTicketDetail::where('book_ticket_id', $id)->get();
        $contact = ContactInfo::first();
        $user = User::all();
        $food = Food::all();
        $film = Film::all();
        $time = Time::all();
        $room = MovieRoom::all();
        $chair = MovieChair::all();
        $cinema = Cinema::all();
        $timeDetail = TimeDetail::all();
        $seats = json_decode($listData[0]['chair'], true);
        foreach($seats as $value){
            $Str = substr($value, 0, 1);
            if($Str >= 'a' && $Str <= 'd'){
                $dts = 'regular seat';
            }else if($Str >= 'e' && $Str <= 'h'){
                $dts = 'vip seat';
            }else{
                $dts = 'couple seat';
            }
            array_push($type, $dts);
        }
        return view('back-end.manage.bill.detail', compact('chair' ,'listData', 'food', 'Flag', 'timeDetail', 'film', 'time', 'room', 'cinema', 'seats', 'type', 'book', 'user', 'contact'));
    }

    public function post_Edit(Request $request, $id){
        $finbyId = BookTicket::find($id);
        $finbyId->update([
            'status'=>$request->status,
        ]);
        Alert::success('Update!', 'Successfully Update Status Bill.');
        return redirect()->back();
    }

    public function delete($id){
        $finbyId = BookTicket::find($id);
        $finbyId->delete();
        Alert::success('Delete!', 'Successfully Delete Bill.');
        return redirect()->back();
    }
}
