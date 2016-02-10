<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class AccountsummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dt = Carbon::now();
        $year = $dt->year;

        $january = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','01')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $february = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','02')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $march = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','03')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $april = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','04')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $may = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','05')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $june = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','06')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $july = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','07')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $august = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','08')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $september = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','09')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $october = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','10')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $november = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','11')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();

        $december = DB::table('accounts')
            ->join('users', function ($join) {
                $join->on('accounts.user_id', '=', 'users.id');
            })
            ->groupBy('accounts.user_id')
            ->orderBy('users.room_id', 'asc')
            ->whereYear('accounts.accountdate','=', $year)
            ->whereMonth('accounts.accountdate','=','12')
            ->select('users.*',
                DB::raw("SUM(amount) AS total")
            )->get();


        return view('accountsummary.index', [
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
