<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Banner\AddRequest;
use App\Http\Requests\Banner\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Banner;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listData = Banner::paginate(1);
        return view('back-end.manage.ui-elements.banner', compact('listData'));
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
    public function store(AddRequest $request, Banner $AddBanner)
    {
        $AddBanner->add($request);
        Alert::success('Success', 'Successfully Add New Banner.');
        return redirect()->back();
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
        $finbyId = Banner::find($id);
        return view('back-end.manage.ui-elements.banner-edit', compact('finbyId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id, Banner $EditBanner)
    {
        $EditBanner->edit($request, $id);
        Alert::success('Update!', 'Successfully Update Banner.');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Banner $DeleteBanner)
    {
        $DeleteBanner->Remove($id);
        Alert::success('Delete!', 'Successfully Delete Banner.');
        return redirect()->route('banner.index');
    }
}
