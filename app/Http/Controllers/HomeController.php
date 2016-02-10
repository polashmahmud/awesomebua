<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Shop;
use App\Account;
use App\Useraccount;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $tomorrowbookinguser = Booking::where('bookingdate', '=', $tomorrow)->get();

        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;

        $currentmonthbreakfast = Booking::where('user_id', Auth::user()->id)
            ->whereMonth('bookingdate', '=', $month)
            ->whereYear('bookingdate', '=', $year)
            ->where('breakfast', '=', 'on')->count();
        $currentmonthlunch = Booking::where('user_id', Auth::user()->id)
            ->whereMonth('bookingdate', '=', $month)
            ->whereMonth('bookingdate', '=', $month)
            ->whereYear('bookingdate', '=', $year)
            ->where('lunch', '=', 'on')->count();
        $currentmonthdinner = Booking::where('user_id', Auth::user()->id)
            ->whereMonth('bookingdate', '=', $month)
            ->whereMonth('bookingdate', '=', $month)
            ->whereYear('bookingdate', '=', $year)
            ->where('dinner', '=', 'on')->count();
        $totalbooking = $currentmonthbreakfast + $currentmonthlunch + $currentmonthdinner;

        $price = Account::whereMonth('accountdate', '=', date('m'))
            ->where('user_id', Auth::user()->id)
            ->sum('amount');


        $todaydayshop = Shop::where('shopdate', $today)->get();
        $tomorrowshop = Shop::where('shopdate', $tomorrow)->get();

        $bookings = Booking::where('bookingdate', '=', $today)->get();
        $breakfast = Booking::where('bookingdate', '=', $today)
                    ->where('breakfast', '=', 'on')->count();
        $lunch = Booking::where('bookingdate', '=', $today)
                    ->where('lunch', '=', 'on')->count();
        $dinner = Booking::where('bookingdate', '=', $today)
                    ->where('dinner', '=', 'on')->count();

        $t_breakfast = Booking::where('bookingdate', '=', $tomorrow)
            ->where('breakfast', '=', 'on')->count();
        $t_lunch = Booking::where('bookingdate', '=', $tomorrow)
            ->where('lunch', '=', 'on')->count();
        $t_dinner = Booking::where('bookingdate', '=', $tomorrow)
            ->where('dinner', '=', 'on')->count();

        $useraccounts = DB::table('useraccounts')->where('user_id', Auth::user()->id)
            ->select('user_id',
                DB::raw("SUM(foodamount) AS t_foodamount"),
                DB::raw("SUM(houserent) AS t_houserent"),
                DB::raw("SUM(internetbill) AS t_internetbill"),
                DB::raw("SUM(utlitybill) AS t_utlitybill"),
                DB::raw("SUM(buabill) AS t_buabill"),
                DB::raw("SUM(pay) AS t_pay")
            )
            ->get();

        foreach($useraccounts as $account){
            $amount = $account->t_foodamount + $account->t_houserent + $account->t_internetbill + $account->t_utlitybill + $account->t_buabill;
            $balance = $amount - $account->t_pay;
        }

        return view('home', [
            'bookings' => $bookings,
            'breakfast' => $breakfast,
            'lunch' => $lunch,
            'dinner' => $dinner,
            't_breakfast' => $t_breakfast,
            't_lunch' => $t_lunch,
            't_dinner' => $t_dinner,
            'tomorrow' => $tomorrow,
            'todaydayshop' => $todaydayshop,
            'tomorrowshop' => $tomorrowshop,
            'tomorrowbookinguser' => $tomorrowbookinguser,
            'balance' => $balance,
            'currentmonthbreakfast' => $currentmonthbreakfast,
            'currentmonthlunch'    => $currentmonthlunch,
            'currentmonthdinner'   => $currentmonthdinner,
            'totalbooking'         => $totalbooking,
            'price'         => $price,
        ]);
    }
}
