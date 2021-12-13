<?php

namespace App\Http\Controllers;

use App\Helper\CartAjax;
use App\Helper\MovieAjax;
use App\Http\Requests\RegisterRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Food;
use App\Models\Blog;
use App\Models\MovieChair;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\TimeDetail;
use App\Models\User;
use App\Models\RateStar;
use App\Models\Reviews;
use App\Models\BookTicket;
use App\Models\BookTicketDetail;
use App\Models\ContactInfo;
use Auth;
use Mail;
use Hash;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // $film = Film::where('status', 1)->get();
        $banner = Banner::where('status', 1)->get();
        $chair = MovieChair::all();
        $film1 = Film::where('status', 1)->orderByDesc('id')->limit(3)->get();
        $film2 = Film::where('status', 2)->orderByDesc('id')->get();
        $cinema = Cinema::all();
        return view('index', compact('film1', 'film2', 'cinema', 'chair', 'banner'));
    }

    // movie 
    public function movie(Request $req, MovieAjax $ajax)
    {
        $list = $ajax->content();
        $check_category = [];
        $check_limit = 0;
        $limit = 6;
        $cinema = Cinema::all();
        $banner = Banner::where('status', 1)->get();
        $category = Category::where('status', 1)->get();
        if ($req->film && $req->cinema && $req->date) {
            $film = Film::join('cinema_details', 'films.id', '=', 'cinema_details.film_id')
                ->join('cinemas', 'cinemas.id', '=', 'cinema_details.cinema_id')
                ->select('films.*')
                ->distinct()
                ->where('films.name', 'like', "%$req->film%")
                ->where('cinemas.name', $req->cinema)
                ->where('films.release_date', '<=', $req->date)
                ->paginate($limit);
            return view('movie', compact('film', 'category', 'banner', 'cinema', 'check_category', 'check_limit'));
        }
        if (!$req->has('page')) {
            $ajax->clear();
            $film = Film::where('status', 1)->orWhere('status', 2)->orderByDesc('id')->paginate($limit);
        } else {
            if ($list != []) {
                $check_category = $list['category'];
                if ($check_category == []) {
                    $check_category = [0];
                }
                $film = Film::join('category_details', 'films.id', '=', 'category_details.film_id')
                    ->select('films.*')->distinct()->orderByDesc('id');

                if ($list['category']) {
                    foreach ($list['category'] as $value) {
                        $film->orWhere('category_details.category_id', $value);
                    }
                }
                $film = $film->paginate($list['limit']);
            } else {
                $film = Film::where('status', 1)->orWhere('status', 2)->orderByDesc('id')->paginate($limit);
            }
        }
        if (($req->has('film') || $req->has('cinema') || $req->has('date')) && ($req->film=='' || $req->cinema=='' || $req->date=='')) {
            $film = Film::where('status', 0)->get();
        }
        return view('movie', compact('film', 'category', 'banner', 'cinema', 'check_category', 'check_limit'));
    }

    public function ajax_movie(Request $req, MovieAjax $ajax)
    {
        $film = Film::join('category_details', 'films.id', '=', 'category_details.film_id')
            ->select('films.*')->distinct()->orderByDesc('id');
        $ajax->film($req->category, $req->limit);
        $list = $ajax->content();

        if ($list['category']) {
            foreach ($list['category'] as $value) {
                $film->orWhere('category_details.category_id', $value);
            }
        }
        $film->where('status', '!=', 3)->paginate($list['limit']);
        return $film->get();
    }
    // end movie 

    // food 
    public function food(CartAjax $cart)
    {
        $banner = Banner::where('status', 1)->first();
        $no_combo = Food::where('status', 1)->where('combo', 1)->get();
        $combo = Food::where('status', 1)->where('combo', 2)->get();
        return view('food', compact('no_combo', 'combo', 'banner', 'cart'));
    }

    public function add_food($id, CartAjax $cart, Request $req)
    {
        $food = Food::find($id);
        $cart->food($food, $req->qty);
        return redirect()->back()->with('success', 'Add to cart success!');
    }

    public function update_food($id, CartAjax $cart, Request $req)
    {
        $cart->update_food($id, $req->qty);
        return redirect()->back()->with('success', 'Update success');
    }
    
    public function remove_food($id, CartAjax $cart){
        $cart->remove_food($id);
        return redirect()->back();
    }
    // end food 

    // blog 
    public function blog()
    {
        $limit = 4;
        $blog = Blog::where('status', 1)->paginate($limit);
        return view('blog', compact('blog'));
    }
    
    public function blog_detail($id)
    {
        $blog = Blog::find($id);
        $cmt = Comment::where('status', 1)->where('blog_id', $id)->get();
        return view('blog-detail', compact('blog', 'cmt'));
    }

    public function post_blog_detail($id, Request $req){
        $req->validate(['mess'=>'required']);
        Comment::create([
            'blog_id'=>$id,
            'user_id'=>Auth::user()->id,
            'content'=>$req->mess
        ]);
        return redirect()->back();
    }
    // end blog 

    // contact 
    public function contact()
    {
        $contact = ContactInfo::all();
        return view('contact', compact('contact'));
    }
    
    public function post_contact(Request $req)
    {
        $req->validate(['mess'=>'required']);
        Feedback::create([
            'user_id'=>Auth::user()->id,
            'content'=>$req->mess
        ]);
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
    // end contact 

    public function cart(CartAjax $cart)
    {
        $list = $cart->content();
        $food = $cart->content_food();
        return view('cart', compact('list', 'food'));
    }

    // login 
    public function login()
    {
        return view('login');
    }

    public function post_login(Request $req)
    {
        if (Auth::attempt($req->only('email', 'password'))) {
            if ($req->has('checkout')) {
                return redirect()->route('checkout', $req->book);
            }
            if ($req->has('comment')) {
                return redirect()->route('blog-detail', $req->comment);
            }
            if ($req->has('film_detail')) {
                return redirect()->route('film-detail', $req->film_detail);
            }
            if ($req->has('contact')) {
                return redirect()->route('contact');
            }
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'Email or Password is not correct!')->withInput();
        }
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(RegisterRequest $request, User $SignUp)
    {
        $SignUp->add($request);
        return redirect()->route('login');
    }

    // reset password 
    public function check_email(){
        return view('check-email');
    }

    public function post_check_email(ResetPasswordRequest $req){
        $token = $req->_token;
        $id = User::where('email', $req->email)->first()->id;
        User::find($id)->update(['remember_token'=>$token]);
        Mail::send('mail.reset', compact('token', 'id'), function($email) use($req){
            $email->subject('Boleto-reset-password');
            $email->to($req->email);
        });
        return redirect()->route('index')->with('success', 'We have already sent a link to your email! Please check your email!');
    }

    public function reset_password(){
        return view('reset-password');
    }
    
    public function post_reset_password(Request $req){
        $user = User::where('id', $req->id)->first();
        $req->validate(['password'=>'required|confirmed']);
        if ($user && $user->remember_token==$req->token) {
           User::find($req->id)->update([
                'password'=>Hash::make($req->password)
           ]);
           return redirect()->route('login')->with('success', 'Change Password success!');
        }else{
            return view('errors.404');
        }
    }
    // end reset password 

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    // end login 

    // film detail 
    public function film_detail($id)
    {   
        $rates_avg = RateStar::where('film_id', $id)->avg('star');
        $rates = RateStar::where('film_id', $id)->get();
        $star = 0;
        $review = Reviews::where('film_id', $id)->orderByDesc('id')->paginate(5);
        $count = count($review);
        $book = BookTicket::all();
        if (Auth::check()) {
            $check_star = RateStar::where('film_id', $id)->where('user_id', Auth::user()->id)->first();
            if ($check_star) {
                $star = $check_star->star;
            }
        }
        $banner = Banner::where('status', 1)->get();
        $film = Film::find($id);
        return view('film-detail', compact('film', 'banner', 'rates', 'rates_avg', 'star', 'review', 'count', 'book'));
    }

    public function post_film_detail(Request $req, Reviews $review){
        $req->validate(['mess'=>'required']);
        $check = Reviews::where('user_id', Auth::user()->id)->where('film_id', $req->film_id)->first();
        if ($check) {
            $check->update([
                'content'=>$req->mess
            ]);
        }else{
            $review->add(Auth::user()->id, $req);
        }
        return redirect()->back();
    }

    public function rate(Request $req, RateStar $rate){
        $check = RateStar::where('user_id', $req->user_id)->where('film_id', $req->film_id)->first();
        if($check){
            $check->update([
                'star'=>$req->star
            ]);
            return $check;
        }else{
            $rate->add($req);
            return $rate;
        }
    }
    // end film detail 

    // book
    public function book($slug, Request $req, CartAjax $cart)
    {
        $time = '';
        $date = '';
        $seat = 0;
        $row = 0;
        $row_arr = [];
        $letter = range('a', 'z');
        $check_seat = [];
        $list = $cart->content();
        $update_seat = [];

        if ($req->has('date')) {
            $time = TimeDetail::join('times', 'times.id', '=', 'time_details.time_id')
                ->select('times.*')
                ->where('time_details.date', $req->date)
                ->where('time_details.film_id', $req->id)
                ->distinct()
                ->get();
            $date = TimeDetail::where('cinema_id', $req->cinema)
                ->where('film_id', $req->id)
                ->select('date')
                ->distinct()
                ->get();
            $room = TimeDetail::where('film_id', $req->id)
                ->where('cinema_id', $req->cinema)
                ->where('date', $req->date)
                ->where('time_id', $req->time)
                ->first();
            if ($room) {
                $seat = $room->room->quantity_Chair;
                $row = $seat / 10;
                $row_arr = array_slice($letter, 0, $row);
                $time_detail_id = TimeDetail::where('date', $req->date)
                    ->where('time_id', $req->time)
                    ->where('cinema_id', $req->cinema)
                    ->where('film_id', $req->id)
                    ->first()->id;
                if (isset($list[$time_detail_id])) {
                    $update_seat = $list[$time_detail_id]['seat'];
                }
                $booked = BookTicketDetail::where('time_id', $room->id)->get();
                // dd($booked);
                if($booked){
                    foreach($booked as $item){
                        if($item->chair){
                            $check_seat = array_merge($check_seat, json_decode($item->chair));
                        }
                    }
                }
            }
        }
        $film = Film::where('slug', $slug)->first();
        $cinema = Film::join('time_details', 'films.id', '=', 'time_details.film_id')
            ->join('cinemas', 'cinemas.id', '=', 'time_details.cinema_id')
            ->where('films.slug', $slug)
            ->select('cinemas.*')
            ->distinct()
            ->get();
        return view('book', compact('film', 'time', 'cinema', 'date', 'row_arr', 'check_seat', 'update_seat'));
    }

    public function ajax_book(Request $req, CartAjax $cart)
    {
        $time_detail = TimeDetail::where('date', $req->date)
            ->where('time_id', $req->time)
            ->where('cinema_id', $req->cinema)
            ->where('film_id', $req->id)
            ->first();
        $cart->film($time_detail, $req->chosen);
    }

    public function ajax_book_date(Request $req)
    {
        $time_detail = TimeDetail::join('times', 'times.id', '=', 'time_details.time_id')
            ->select('times.*')
            ->where('time_details.cinema_id', $req->cinema)
            ->where('time_details.date', $req->date)
            ->where('time_details.film_id', $req->id)
            ->distinct()
            ->get();
        return $time_detail;
    }

    public function ajax_book_cinema(Request $req)
    {
        $dateNow = Carbon::now()->toDateString();
        $time_detail = TimeDetail::where('cinema_id', $req->cinema)
            ->where('film_id', $req->id)
            ->select('date')
            ->where('time_details.date', '>=', $dateNow)
            ->distinct()
            ->get();
        return $time_detail;
    }

    public function remove_film($id, CartAjax $cart){
        $cart->remove_film($id);
        return redirect()->back();
    }
    // end book

    // check out 
    public function checkout(CartAjax $cart){
        return view('checkout', compact('cart'));
    }

    public function post_checkout(CartAjax $cart){
        if(empty($cart->content()) && empty($cart->content_food())){
            return redirect()->back()->with('error', 'You must buy at least 1 item!');
        }
        $id = BookTicket::create([
            'user_id'=>Auth::user()->id,
            'amount'=>$cart->get_total_amount(),
            'price'=>$cart->get_total_price()
        ])->id;
        foreach($cart->content() as $key => $item){
            BookTicketDetail::create([
                'book_ticket_id'=>$id,
                'time_id'=>$key,
                'chair'=>json_encode($item['seat']),
                'quantity'=>$item['qty'],
                'price'=>$item['price']
            ]);
        }
        foreach($cart->content_food() as $key => $item){
            BookTicketDetail::create([
                'book_ticket_id'=>$id,
                'food_id'=>$key,
                'quantity'=>$item['qty'],
                'price'=>$item['price']
            ]);
        }
        $user = Auth::user();
        Mail::send('mail.checkout', compact('cart'), function($email) use($user){
            $email->subject('Boleto-cart');
            $email->to($user->email);
        });
        $cart->clear();
        return redirect()->route('index')->with('success', 'Thank you for buying!');
    }

    public function contact_info(ContactRequest $req){
        ContactInfo::create([
            'user_id'=>Auth::user()->id,
            'email'=>$req->email,
            'address'=>$req->address,
            'phone'=>$req->phone
        ]);
        return redirect()->back()->with('success', 'Add infomation success!');
    }
    // end check out 
    
    // history 
    public function history($id){
        $history = BookTicket::where('user_id', $id)->get();
        $time = TimeDetail::all();
        $food = Food::all();
        return view('history', compact('history', 'time', 'food'));
    }
    // end history 
}
