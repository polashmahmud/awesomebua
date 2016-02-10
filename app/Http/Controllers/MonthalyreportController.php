<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Useraccount;

class MonthalyreportController extends Controller
{
    public function index(Request $request)
    {

        $month = $request->month;
        $year = $request->year;

        $monthName = date("F", mktime(0, 0, 0, $month, 10));

        $accounts = Useraccount::whereMonth('houserentdate','=', $month)->whereYear('houserentdate','=', $year)->get();

        return view('reports.monthaly', compact('accounts', 'monthName', 'year'));
    }
}
