<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Film\AddRequest;
use App\Http\Requests\Film\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\Cinema;
use App\Models\MovieRoom;
use App\Models\CategoryDetail;
use App\Models\CinemaDetail;
use App\Models\TimeDetail;
use App\Models\FilmMaker;
use App\Models\Film;
use App\Models\Photo;
use App\Models\Time;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = Film::where('name', 'like', "%$keywords%")->paginate(1);
        $Count = Film::where('name', 'like', "%$keywords%")->count();
        $CateOfFilm = CategoryDetail::join('categories', 'categories.id', '=', 'category_details.category_id')
                    ->get();
        return view('back-end.manage.film.index', compact('listData', 'Flag', 'keywords', 'Count', 'CateOfFilm'));
    }

    public function index()
    {
        $Flag = 1;
        $listData = film::orderBy('release_date', 'DESC')->paginate(4);
        $CateOfFilm = CategoryDetail::join('categories', 'categories.id', '=', 'category_details.category_id')
                    ->get();
        return view('back-end.manage.film.index', compact('listData', 'CateOfFilm', 'Flag'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCate = Category::where('status', 1)->get();
        $listCinema = Cinema::where('status', 1)->get();
        $listRoom = MovieRoom::get();
        $listTime = Time::get();
        return view('back-end.manage.film.add', compact(['listCate', 'listCinema', 'listRoom', 'listTime']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request, Film $AddFilm)
    {
        $AddFilm->add($request);
        Alert::success('Success', 'Successfully Add New Film.');
        return redirect()->route('film.index');
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
        $finbyId = Film::find($id);
        $listCate = Category::where('status', 1)->get();
        $listCinema = Cinema::where('status', 1)->get();
        $listRoom = MovieRoom::get();
        $listTime = Time::get();
        $CateOfFilm = CategoryDetail::where('film_id', $id)->get();
        $CinemaOfFilm = CinemaDetail::where('film_id', $id)->get();
        $RoomOfFilm = TimeDetail::where('film_id', $id)->get();
        $Photos = Photo::where('film_id', $id)->get();
        $FilmMakerCrew = FilmMaker::where('film_id', $id)->where('type', 1)->get();
        $FilmMakerCast = FilmMaker::where('film_id', $id)->where('type', 2)->get();
        return view('back-end.manage.film.edit', compact(['listCate', 'listCinema', 'finbyId', 'CateOfFilm', 'FilmMakerCrew', 'FilmMakerCast', 'RoomOfFilm', 'CinemaOfFilm', 'Photos', 'listRoom', 'listTime']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Film $EditFilm)
    {
        $EditFilm->edit($request, $id);
        Alert::success('Update!', 'Successfully Update Film.');
        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Film $DeleteFilm)
    {
        $DeleteFilm->Remove($id);
        Alert::success('Delete!', 'Successfully Delete Film.');
        return redirect()->back();
    }
}
