<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\AddRequest;
use App\Http\Requests\Blog\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = Blog::where('title', 'like', "%$keywords%")->paginate(1);
        $Count = Blog::where('title', 'like', "%$keywords%")->count();
        return view('back-end.manage.blog.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }

    public function index()
    {
        $Flag = 1;
        $listData = Blog::paginate(3);
        return view('back-end.manage.blog.index', compact('listData', 'Flag'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.manage.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request, Blog $AddBlog)
    {
        $AddBlog->add($request);
        Alert::success('Success', 'Successfully Add New Blog.');
        return redirect()->route('blog.index');
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
        $finbyId = Blog::find($id);
        return view('back-end.manage.blog.edit', compact('finbyId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id, Blog $EditBlog)
    {
        $EditBlog->edit($request, $id);
        Alert::success('Update!', 'Successfully Update Blog.');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Blog $DeleteBlog)
    {
        $DeleteBlog->Remove($id);
        Alert::success('Delete!', 'Successfully Delete Blog.');
        return redirect()->route('blog.index');
    }
}
