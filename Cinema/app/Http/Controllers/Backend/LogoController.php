<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Logo\AddRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listData = Logo::orderBy('status', 'ASC')
                        ->paginate(3);
        return view('back-end.manage.ui-elements.logo', compact('listData'));
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
    public function store(AddRequest $request, Logo $AddLogo)
    {
        $AddLogo->add($request);
        Alert::success('Success', 'Successfully Add New Logo.');
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
        $finbyId = Logo::find($id);
        return view('back-end.manage.ui-elements.logo-edit', compact('finbyId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Logo $EditLogo)
    {
        $EditLogo->edit($request, $id);
        Alert::success('Update!', 'Successfully Update Logo.');
        return redirect()->route('logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Logo $DeleteLogo)
    {
        $DeleteLogo->Remove($id);
        Alert::success('Delete!', 'Successfully Delete Logo.');
        return redirect()->route('logo.index');
    }
}
