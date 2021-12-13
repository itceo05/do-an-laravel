<?php

namespace App\Providers;

use App\Models\BookTicket;
use App\Models\Feedback;
use App\Models\Film;
use App\Models\User;
use App\Models\Logo;
use Carbon\Carbon;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $logo = Logo::where('status', 1)->first();
        View::share('logo', $logo);
        Paginator::defaultView('pagination::default');
        View::composer('*', function ($view) {

            $Year = Carbon::now()->year; //năm
            $Today = Carbon::now()->toDateString();
            $firstDayOfYear = new Carbon("first day of $Year");
            $lastDayOfYear = new Carbon("last day of $Year");
            $listDataOfMonth = BookTicket::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->count();
            $TotalRevenue = BookTicket::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->sum('price');
            $TodaySales = BookTicket::where('created_at', 'LIKE', "%$Today%")
                ->sum('price');

            $Sales = BookTicket::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->sum('amount');
            $Order = BookTicket::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->count();

            $NewUser = User::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->count();
            $NewFeedback = Feedback::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->count();

            $user = User::all();

            $topUser = User::select('users.id',DB::raw('count(book_tickets.user_id) as booking'))
                ->join('book_tickets', 'book_tickets.user_id', '=', 'users.id')
                ->groupBy('users.id', 'book_tickets.user_id')
                ->orderBy('booking', 'DESC')
                ->limit(5)
                ->get();
            $firstDayOflastMonth = $firstDayOfYear->subMonth();
            $lastDayOflastMonth = $lastDayOfYear->subMonth();
            $RevenueLastMonth = BookTicket::whereBetween('created_at', [$firstDayOflastMonth, $lastDayOflastMonth])
                ->sum('price');
            $CountLastMonth = BookTicket::whereBetween('created_at', [$firstDayOfYear, $lastDayOfYear])
                ->count();
            if ($TotalRevenue > $RevenueLastMonth) {
                $Analysis = ($TotalRevenue - $RevenueLastMonth) / 100;
            } else {
                $Analysis = ($RevenueLastMonth - $TotalRevenue) / 100;
            }

            $view->with([
                'listDataOfMonth' => $listDataOfMonth,
                'TodaySales' => $TodaySales,
                'TotalRevenue' => $TotalRevenue,
                'Sales' => $Sales,
                'NewFeedback' => $NewFeedback,
                'NewUser' => $NewUser,
                'RevenueLastMonth' => $RevenueLastMonth,
                'CountLastMonth' => $CountLastMonth,
                'Analysis' => $Analysis,
                'topUser' => $topUser,
                'user' => $user
            ]);
        });
    }
}
