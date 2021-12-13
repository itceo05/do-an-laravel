<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\MovieRoomController;
use App\Http\Controllers\Backend\MovieChairController;
use App\Http\Controllers\Backend\CinemaController;
use App\Http\Controllers\Backend\FilmController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\TimeController;
use App\Http\Controllers\Backend\TimeShowController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\BillController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\FeedbackController;
use App\Http\Controllers\Backend\PdfController;
use App\Http\Controllers\Backend\FoodController;
use App\Http\Controllers\Backend\RecycleBinController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// front-end 
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/food', [HomeController::class, 'food'])->name('food');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{id}', [HomeController::class, 'blog_detail'])->name('blog-detail');
Route::post('/blog-detail/{id}', [HomeController::class, 'post_blog_detail']);

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'post_contact']);

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/film-detail/{id}', [HomeController::class, 'film_detail'])->name('film-detail');
Route::post('/film-detail/{id}', [HomeController::class, 'post_film_detail']);
Route::get('/ajax/rate', [HomeController::class, 'rate'])->name('rate');

Route::get('/movie', [HomeController::class, 'movie'])->name('movie');
Route::get('/ajax/movie', [HomeController::class, 'ajax_movie']);
Route::get('/ajax/book', [HomeController::class, 'ajax_book']);
Route::get('/ajax/book-date', [HomeController::class, 'ajax_book_date']);
Route::get('/ajax/book-cinema', [HomeController::class, 'ajax_book_cinema']);
Route::get('/book/{slug}', [HomeController::class, 'book'])->name('book');

Route::post('/add-food/{id}', [HomeController::class, 'add_food'])->name('add-food');
Route::post('/update-food/{id}', [HomeController::class, 'update_food'])->name('update-food');

Route::get('/remove-film/{id}', [HomeController::class, 'remove_film'])->name('remove-film');
Route::get('/remove-food/{id}', [HomeController::class, 'remove_food'])->name('remove-food');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/post-checkout', [HomeController::class, 'post_checkout'])->name('post-checkout');
Route::post('/customer/contact-info', [HomeController::class, 'contact_info'])->name('customer.contact-info');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'post_login']);
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'post_register'])->name('post_register');
Route::get('/logout_user', [HomeController::class, 'logout'])->name('logout_user');
Route::get('/customer/reset-password', [HomeController::class, 'check_email'])->name('customer.check-email');
Route::post('/customer/reset-password', [HomeController::class, 'post_check_email']);
Route::get('/customer/reset-password/{id}/{token}', [HomeController::class, 'reset_password'])->name('customer.reset-password');
Route::post('/customer/reset-password/{id}/{token}', [HomeController::class, 'post_reset_password']);

Route::get('/history/{id}', [HomeController::class, 'history'])->name('history');

// back-end 
Route::get('/login_admin', function () {
    return view('back-end.manage.account.login');
})->name('login_admin');

Route::post('/login_admin', [DashboardController::class, 'post_login'])->name("post_login");
Route::get('/logout', [DashboardController::class, 'logout'])->name("logout");

Route::fallback(function(){
    return view('back-end.manage.errors.404');
});

Route::get('forgot-password', [AccountController::class, 'Forgot'])->name('forgotPassword');
Route::post('forgot-password', [AccountController::class, 'post_Forgot'])->name('post_Forgot');
Route::get('reset-password', [AccountController::class, 'reset_Password'])->name('reset_password');
Route::post('/recover-password', [AccountController::class, 'postReset'])->name('postReset');
//, 'middleware'=>'check_admin'
Route::group(['prefix'=>'admin', 'middleware'=>'check_admin'], function(){
    Route::get('/', function () {
        return view('back-end.manage.dashboard.index');
    })->name('Dashboard');

    Route::resource('dashboard', DashboardController::class);
    Route::get('/edit-profile', [DashboardController::class, 'editProfile'])->name("EditProfile");
    Route::post('/edit-profile', [DashboardController::class, 'post_editProfile'])->name("post_editProfile");

    Route::resource('banner', BannerController::class);

    Route::resource('logo', LogoController::class);

    Route::resource('category', CategoryController::class);
    Route::get('find-cate', [CategoryController::class, 'Search'])->name('search-cate');

    Route::resource('movie-room', MovieRoomController::class);
    Route::get('find-movie-room', [MovieRoomController::class, 'Search'])->name('search-room');

    Route::resource('movie-chair', MovieChairController::class);
    Route::get('find-movie-chair', [MovieChairController::class, 'Search'])->name('search-chair');

    Route::resource('cinema', CinemaController::class);
    Route::get('find-movie-cinema', [CinemaController::class, 'Search'])->name('search-cinema');

    Route::resource('film', FilmController::class);
    Route::get('find-film', [FilmController::class, 'Search'])->name('search-film');

    Route::resource('blog', BlogController::class);
    Route::get('find-blog', [BlogController::class, 'Search'])->name('search-blog');

    Route::resource('time', TimeController::class);

    Route::resource('show-time', TimeShowController::class);
    Route::get('find-show-time', [TimeShowController::class, 'Search'])->name('search-show-time');

    Route::resource('food', FoodController::class);
    Route::get('find-food', [FoodController::class, 'Search'])->name('search-food');

    Route::resource('contact-info', ContactInfoController::class);

    Route::resource('review', ReviewController::class);
    Route::get('find-review', [ReviewController::class, 'Search'])->name('search-review');

    Route::get('bills', [BillController::class, 'index'])->name('bill');
    Route::get('bills-detail/{id}.html', [BillController::class, 'bill_Detail'])->name('billDetail');
    Route::post('bills-detail/{id}.html', [BillController::class, 'post_Edit'])->name('post_Edit');
    Route::post('delete-bill/{id}.html', [BillController::class, 'delete'])->name('delete-bill');

    Route::get('accounts', [AccountController::class, 'index'])->name('account');
    Route::get('find-account', [AccountController::class, 'Search'])->name('search-account');
    Route::get('profile/{id}.html', [AccountController::class, 'Profile'])->name('profile');
    

    Route::get('comments', [CommentController::class, 'index'])->name('comment');
    Route::get('find-comment', [CommentController::class, 'Search'])->name('search-comment');
    Route::get('edit-comment/{id}.html', [CommentController::class, 'edit'])->name('edit-comment');
    Route::post('edit-comment/{id}.html', [CommentController::class, 'post_Edit'])->name('post-comment');
    Route::post('delete-comment/{id}.html', [CommentController::class, 'delete'])->name('delete-comment');

    Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('find-feedback', [FeedbackController::class, 'Search'])->name('search-feedback');
    Route::get('edit-feedback/{id}.html', [FeedbackController::class, 'edit'])->name('handle-feedback');
    Route::post('edit-feedback/{id}.html', [FeedbackController::class, 'post_Edit'])->name('post-feedback');
    Route::post('delete-feedback/{id}.html', [FeedbackController::class, 'delete'])->name('delete-feedback');

    Route::get('recycle-bin', [RecycleBinController::class, 'index'])->name('recycle-bin');
    Route::get('restore/{id}', [RecycleBinController::class, 'restore'])->name('bin-restore');

    Route::get('pdf', [PdfController::class, 'pdf'])->name('pdf');
    Route::get('create/pdf/{id}', [PdfController::class, 'create_pdf'])->name('create-PDF');
});