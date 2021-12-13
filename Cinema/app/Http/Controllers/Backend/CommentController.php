<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
class CommentController extends Controller
{
    public function index(){
        $Flag = 1;
        $listData = Comment::join('users', 'users.id', '=', 'comments.user_id')
                            ->join('blogs', 'blogs.id', '=', 'comments.blog_id')
                            ->select('comments.*', 'users.name', 'blogs.title')
                            ->paginate(4);
        return view('back-end.manage.comment.index', compact('listData', 'Flag'));
    }

    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = Comment::join('users', 'users.id', '=', 'comments.user_id')
                            ->join('blogs', 'blogs.id', '=', 'comments.blog_id')
                            ->select('comments.*', 'users.name', 'blogs.title')
                            ->where('comments.status', $keywords)
                            ->paginate(4);
        $Count = Comment::where('comments.status', $keywords)->count();
                            
        return view('back-end.manage.comment.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }

    public function edit($id){
        $now =  Carbon::now(7);
        $TimeComment = [];
        $finbyId = Comment::join('blogs', 'blogs.id', '=', 'comments.blog_id')
                            ->select('comments.*', 'blogs.image')
                            ->where('comments.id', $id)
                            ->first();
        $ids = $finbyId->user_id;
        $Auth = User::find($ids);

        $dts = $finbyId->created_at->diffForHumans($now);
        array_push($TimeComment, $dts); 

        return view('back-end.manage.comment.edit', compact('finbyId', 'Auth', 'TimeComment'));
    }

    public function post_Edit(Request $request, $id){
        $finbyId = Comment::find($id);
        $finbyId->update([
            'status'=>$request->status,
        ]);
        Alert::success('Update!', 'Successfully Update Status Comment.');
        return redirect()->back();
    }

    public function delete($id){
        $finbyId = Comment::find($id);
        $finbyId->delete();
        Alert::success('Delete!', 'Successfully Delete Comment.');
        return redirect()->back();
    }
}
