<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\Blog;
use App\Models\MovieRoom;
use App\Models\MovieChair;
use App\Models\Film;
use App\Models\Time;
use App\Models\Food;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Reviews;
class RecycleBinController extends Controller
{
    public function index()
    {
        $RecycleBlog = Blog::onlyTrashed()->get();
        $RecycleCate = Category::onlyTrashed()->get();
        $RecycleRoom = MovieRoom::onlyTrashed()->get();
        $RecycleChair = MovieChair::onlyTrashed()->get();
        $RecycleFilm = Film::onlyTrashed()->get();
        $RecycleTime = Time::onlyTrashed()->get();
        $RecycleFood = Food::onlyTrashed()->get();
        $RecycleCom = Comment::onlyTrashed()->get();
        $RecycleFeed = Feedback::onlyTrashed()->get();
        $RecycleView = Reviews::onlyTrashed()->get();
        return view('back-end.manage.bin.index', compact('RecycleBlog', 'RecycleCom', 'RecycleFeed', 'RecycleView', 'RecycleCate', 'RecycleRoom', 'RecycleChair', 'RecycleFilm', 'RecycleTime', 'RecycleFood'));
    }

    public function restore(Request $request, $id)
    {
        $str = strstr($id, 'bin=');

        if($str == 'bin=food'){
            $RestoreFood = Food::onlyTrashed()->where('id', $id)->restore();
        }else if($str == 'bin=cate'){
            $RestoreCate = Category::onlyTrashed()->where('id', $id)->restore();
        }else if($str == 'bin=room'){
            $RestoreRoom = MovieRoom::onlyTrashed()->where('id', $id)->restore();
        }else if($str == 'bin=blog'){
            $RestoreBlog = Blog::onlyTrashed()->where('id', $id)->restore();
        }else if($str == 'bin=chair'){
            $RestoreChair = MovieChair::onlyTrashed()->where('id', $id)->restore();
        }else if($str == 'bin=time'){
            $RestoreTime = Time::onlyTrashed()->where('id', $id)->restore();
        }else if($str == 'bin=film'){
            $RestoreFilm = Film::onlyTrashed()->where('id', $id)->restore();
        }
        else if($str == 'bin=com'){
            $RestoreFilm = Comment::onlyTrashed()->where('id', $id)->restore();
        }
        else if($str == 'bin=feed'){
            $RestoreFilm = Feedback::onlyTrashed()->where('id', $id)->restore();
        }
        else if($str == 'bin=view'){
            $RestoreFilm = Reviews::onlyTrashed()->where('id', $id)->restore();
        }

        Alert::success('Success', 'Successfully Restore.');
            return redirect()->route('recycle-bin');
    }
}