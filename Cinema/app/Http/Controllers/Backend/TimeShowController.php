<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShowTime\AddRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MovieRoom;
use App\Models\TimeDetail;
use App\Models\BookTicketDetail;
use App\Models\Film;
use App\Models\Time;
use App\Models\Cinema;
class TimeShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = TimeDetail::join('films', 'films.id', '=', 'time_details.film_id')
                                ->join('times', 'times.id', '=', 'time_details.time_id')
                                ->join('movie_rooms', 'movie_rooms.id', '=', 'time_details.room_id')
                                ->select('time_details.*', 'films.name', 'times.time', 'movie_rooms.name as room')
                                ->where('time_details.date', 'like', "%$keywords%")
                                ->orderBy('date', 'DESC')
                                ->paginate(7);
        $Count = TimeDetail::where('date', 'like', "%$keywords%")->count();
        
        return view('back-end.manage.show-time.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }

    public function index()
    {
        $Flag = 1;
        $listData = TimeDetail::join('films', 'films.id', '=', 'time_details.film_id')
                                ->join('times', 'times.id', '=', 'time_details.time_id')
                                ->join('movie_rooms', 'movie_rooms.id', '=', 'time_details.room_id')
                                ->select('time_details.*', 'films.name', 'times.time', 'movie_rooms.name as room')
                                ->orderBy('date', 'DESC')
                                ->paginate(7);
        return view('back-end.manage.show-time.index', compact('listData', 'Flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listFilm = Film::get();
        $listRoom = MovieRoom::get();
        $listTime = Time::get();
        $listCinema = Cinema::where('status', 1)->get();
        return view('back-end.manage.show-time.add', compact(['listRoom', 'listTime', 'listFilm', 'listCinema']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request, TimeDetail $AddShowTime)
    {
        $check = TimeDetail::where('date', $request->date)
                ->where('time_id', $request->time_id)
                ->where('cinema_id', $request->cinema_id)
                ->where('room_id', $request->room_id)
                ->first();
        if($check){
            return redirect()->back()->with('error', 'This time already has film!');
        }
        $AddShowTime->add($request);
        Alert::success('Success!', 'Successfully Add ShowTime.');
        return redirect()->route('show-time.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finbyId = TimeDetail::find($id);
        $listFilm = Film::get();
        $listRoom = MovieRoom::get();
        $listTime = Time::get();
        $listCinema = Cinema::where('status', 1)->get();
        return view('back-end.manage.show-time.edit', compact(['listRoom', 'listCinema', 'listTime', 'listFilm', 'finbyId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, TimeDetail $EditShowTime)
    {
        $EditShowTime->edit($request, $id);
        Alert::success('Success!', 'Successfully Update ShowTime.');
        return redirect()->route('show-time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkBill = BookTicketDetail::where('time_id', $id)->count();
        $finbyId = TimeDetail::find($id);
        if($checkBill == 0 ){
            $finbyId->delete();
            Alert::success('Delete!', 'Successfully Delete ShowTime.');
        }else{
            Alert::error('Delete!', 'This Product Was Ordered!');
        }
        return redirect()->route('show-time.index');
    }
}
