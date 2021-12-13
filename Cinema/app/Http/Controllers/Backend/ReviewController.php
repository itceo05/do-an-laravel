<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Reviews;
use App\Models\User;
use Carbon\Carbon;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Flag = 1;
        $listData = Reviews::join('users', 'users.id', '=', 'reviews.user_id')
                            ->join('films', 'films.id', '=', 'reviews.film_id')
                            ->select('reviews.*', 'users.name', 'films.name as film')
                            ->paginate(4);
        return view('back-end.manage.review.index', compact('listData', 'Flag'));
    }

    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = Reviews::join('users', 'users.id', '=', 'reviews.user_id')
                            ->join('films', 'films.id', '=', 'reviews.film_id')
                            ->select('reviews.*', 'users.name', 'films.name as film')
                            ->where('reviews.status', $keywords)
                            ->paginate(4);
        $Count = Reviews::where('reviews.status', $keywords)->count();
                            
        return view('back-end.manage.review.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $now =  Carbon::now(7);
        $TimeReview = [];
        $finbyId = Reviews::join('films', 'films.id', '=', 'reviews.film_id')
                            ->select('reviews.*', 'films.name')
                            ->where('reviews.id', $id)
                            ->first();
        $ids = $finbyId->user_id;
        $Auth = User::find($ids);
        $dts = $finbyId->created_at->diffForHumans($now);
        array_push($TimeReview, $dts); 
        return view('back-end.manage.review.edit', compact('finbyId', 'Auth', 'TimeReview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $finbyId = Reviews::find($id);
        $finbyId->update([
            'status'=>$request->status,
        ]);
        Alert::success('Update!', 'Successfully Update Status Review.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finbyId = Reviews::find($id);
        $finbyId->delete();
        Alert::success('Delete!', 'Successfully Delete Comment.');
        return redirect()->back();
    }
}
