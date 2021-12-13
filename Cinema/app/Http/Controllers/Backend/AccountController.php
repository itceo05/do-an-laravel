<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Account\RecoverPass;
use App\Models\User;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Reviews;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Mail;
use App\Mail\Recover;
use Hash;
class AccountController extends Controller
{
    public function Forgot(){
        return view('back-end.manage.account.forgot');
    }

    public function post_Forgot(Request $request){
        $checkEmail = User::where('email', $request->email)->first();
        if($checkEmail){
            DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$request->_token
            ]);
            Mail::to($request->email)->send(new Recover($request->_token));
        }else{
            return redirect()->back()->with('error', 'Email information is incorrect!');
        }
        return redirect()->back();
        Alert::success('Success!', 'Check your email successfully, please check your email');
    }

    public function reset_Password(Request $request){
        $info = DB::table('password_resets')->where('token', $request->token)->first();
        $admin = User::where('email', $info->email)->first();
        return view('back-end.manage.account.reset-password', compact('admin'));
    }

    public function postReset(RecoverPass $request){
        $user = User::where('email', $request->email)->first();
        $user->update([
            'password'=>Hash::make($request->password),
        ]);
        $info = DB::table('password_resets')->where('token', $request->token)->update([
            'token'=>'',
        ]);
        return redirect()->route('login_admin');
        Alert::success('Success!', 'Recover password successfully!');
    }

    public function index(){
        $Flag = 1;
        $listData = User::Where('role', 1)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(4);
        return view('back-end.manage.account.index', compact(['listData', 'Flag']));
    }

    public function Search(Request $request){
        $Flag = 2;
        $keywords = $request->keywords;
        $listData = User::Where('role', 1)
                        ->where('name', 'like', "%$keywords%")
                        ->orderBy('created_at', 'DESC')
                        ->paginate(4);
        $Count = User::where('name', 'like', "%$keywords%")->count();
        return view('back-end.manage.account.index', compact('listData', 'Flag', 'keywords', 'Count'));
    }

    public function Profile($id){
        $now =  Carbon::now(7);
        $TimeComment = [];
        $TimeFeedback = [];
        $TimeReview = [];
        $CountComment = Comment::where('user_id', $id)->count();
        $CountFeedback = Feedback::where('user_id', $id)->count();
        $CountReview = Reviews::where('user_id', $id)->count();
        $Auth = User::find($id);
        $listComment = Comment::join('blogs', 'blogs.id', '=', 'comments.blog_id')
                            ->select('comments.*', 'blogs.image')
                            ->where('comments.user_id', $id)
                            ->orderBy('created_at', 'DESC')
                            ->limit(2)
                            ->get();
        $listFeedback = Feedback::where('user_id', $id)
                            ->orderBy('created_at', 'DESC')
                            ->limit(2)
                            ->get();
        $listReview = Reviews::where('user_id', $id)
                            ->orderBy('created_at', 'DESC')
                            ->limit(2)
                            ->get();
        foreach($listComment as $value){
            $dts = $value->created_at->diffForHumans($now);
            array_push($TimeComment, $dts);
        }
        foreach($listFeedback as $value){
            $dts = $value->created_at->diffForHumans($now);
            array_push($TimeFeedback, $dts);
        }
        foreach($listReview as $value){
            $dts = $value->created_at->diffForHumans($now);
            array_push($TimeReview, $dts);
        }
        return view('back-end.manage.account.profile', compact('CountComment', 'CountFeedback', 'CountReview', 'listComment', 'listFeedback', 'listReview','Auth', 'TimeComment', 'TimeFeedback', 'TimeReview'));
    }

}