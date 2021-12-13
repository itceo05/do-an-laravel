<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Time\AddRequest;
use App\Http\Requests\Time\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Film;
use App\Models\Time;
use App\Models\TimeDetail;
use App\Models\MovieRoom;
class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listData = Time::paginate(2);
        return view('back-end.manage.time.index', compact('listData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request, Time $AddTime)
    {
        $AddTime->add($request);
        Alert::success('Success!', 'Successfully Add New Time.');
        return redirect()->route('time.index');
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
        $finbyId = Time::find($id);
        return view('back-end.manage.time.edit', compact('finbyId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id, Time $EditTime)
    {
        $EditTime->edit($request, $id);
        Alert::success('Update!', 'Successfully Update Time.');
        return redirect()->route('time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Time $DeleteTime)
    {
        $DeleteTime->Remove($id);
        Alert::success('Delete!', 'Successfully Delete Time.');
        return redirect()->back();
    }
}