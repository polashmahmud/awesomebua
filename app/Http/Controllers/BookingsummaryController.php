<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Booking;
use App\User;
use DB;

class BookingsummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Carbon::now();
        $year = $dt->year;

        $january = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','01')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $february = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','02')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $march = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','03')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $april = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=','2016')
            ->whereMonth('bookings.bookingdate','=','04')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $may = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','05')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $june = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','06')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $july = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','07')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $august = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','08')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $september = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','09')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $october = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','10')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $november = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','11')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        $december = DB::table('bookings')
            ->join('users', function ($join) {
                $join->on('bookings.user_id', '=', 'users.id');
            })
            ->groupBy('bookings.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('bookings.bookingdate','=', $year)
            ->whereMonth('bookings.bookingdate','=','11')
            ->select('users.*',
                DB::raw("COUNT(case when bookings.breakfast='on' then 1 else null end) AS t_breakfast"),
                DB::raw("COUNT(case when bookings.lunch='on' then 1 else null end) AS t_lunch"),
                DB::raw("COUNT(case when bookings.dinner='on' then 1 else null end) AS t_dinner")
            )
            ->get();

        return view('booking.bookingsummary', [
            'january' => $january,
            'february' => $february,
            'march' => $march,
            'april' => $april,
            'may' => $may,
            'june' => $june,
            'july' => $july,
            'august' => $august,
            'september' => $september,
            'october' => $october,
            'november' => $november,
            'december' => $december,
            'year' => $year,
        ]);
    }

}
