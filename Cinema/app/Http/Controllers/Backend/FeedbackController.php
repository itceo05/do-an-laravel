<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
class FeedbackController extends Controller
{
    public function index(){
        $Flag = 1;
        $listData = Feedback::join('users', 'users.id', '=', 'feedback.user_id')
                            ->select('users.name', 'feedback.*')
                            ->paginate(4);
        return view('back-end.manage.feedback.index', compact('listData', 'Flag'));
    }

    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = Feedback::join('users', 'users.id', '=', 'feedback.user_id')
                            ->where('status', $keywords)
                            ->paginate(4);
                            
        $Count = Feedback::where('status', $keywords)->count();
        return view('back-end.manage.feedback.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }

    public function edit($id){
        $now =  Carbon::now(7);
        $TimeFeedback = [];

        $finbyId = Feedback::find($id);
        $ids = $finbyId->user_id;
        $Auth = User::find($ids);

        $dts = $finbyId->created_at->diffForHumans($now);
        array_push($TimeFeedback, $dts);    
        return view('back-end.manage.feedback.edit', compact('finbyId', 'Auth', 'TimeFeedback'));
    }

    public function post_Edit(Request $request, $id){
        $finbyId = Feedback::find($id);
        $finbyId->update([
            'status'=>$request->status,
        ]);
        Alert::success('Update!', 'Successfully Update Status Feedback.');
        return redirect()->back();
    }

    public function delete($id){
        $finbyId = Feedback::find($id);
        $finbyId->delete();
        Alert::success('Delete!', 'Successfully Delete Feedback.');
        return redirect()->back();
    }
}
