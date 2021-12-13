<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\AddRequest;
use App\Http\Requests\Category\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = Category::where('name', 'like', "%$keywords%")->paginate(2);
        $Count = Category::where('name', 'like', "%$keywords%")->count();
        return view('back-end.manage.category.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }
    
    public function index()
    {
        $Flag = 1;
        $listData = Category::paginate(2);
        
        return view('back-end.manage.category.index', compact('listData', 'Flag'));
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
    public function store(AddRequest $request, Category $AddCate)
    {
        $AddCate->add($request);
        // Alert::success('Success', 'Successfully Add New Category Film.');
        return redirect()->back()->with('success', 'Successfully Add New Category.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finbyId = Category::find($id);
        return view('back-end.manage.category.edit', compact('finbyId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id, Category $EditCate)
    {
        $EditCate->edit($request, $id);
        Alert::success('Update!', 'Successfully Update Category Film.');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Category $DeleteCate)
    {
        $DeleteCate->remove($id);
        Alert::success('Delete!', 'Successfully Delete Category Film.');
        return redirect()->back();
    }
}
