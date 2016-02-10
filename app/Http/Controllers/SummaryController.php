<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use App\Booking;
use App\Useraccount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Laracasts\Flash\Flash;

class SummaryController extends Controller
{
    public function index(Request $request){

        $this->validate($request, [
            'month' => 'required',
            'year' => 'required',
        ]);

        $month = $request->month;
        $year = $request->year;

        $monthNum = $request->month;
        $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));


        $data = DB::select("SELECT users.id, users.name , users.picture, users.room_id,
            SUM(CASE WHEN bookings.breakfast='on' THEN 1 ELSE 0 END) AS t_b ,
            SUM(CASE WHEN bookings.lunch='on' THEN 1 ELSE 0 END) AS t_l ,
            SUM(CASE WHEN bookings.dinner='on' THEN 1 ELSE 0 END) AS t_d FROM `users`
        INNER JOIN
        `bookings` ON users.id=bookings.user_id AND
        MONTH(bookings.bookingdate) = $month AND
        YEAR(bookings.bookingdate) = $year

        GROUP BY users.id
        ORDER BY users.room_id ASC");

        $datas = [];
        $data = json_decode(json_encode($data),true);
        foreach ($data as $key => $value) {
            $x = [];
            $x = $value;
            $x['exp'] = Account::where('user_id',$x['id'])->whereMonth('accountdate','=',$month)->whereYear('accountdate','=',$year)->sum('amount');
            $datas[] = $x;
        }

        $total_t_b = $total_t_l = $total_t_d = $total_exp = 0;
        foreach ($datas as $data) {
            $total_t_b += $data['t_b'];
            $total_t_l += $data['t_l'];
            $total_t_d += $data['t_d'];
            $total_exp += $data['exp'];
            
        }
        $g_total = $total_t_b + $total_t_l + $total_t_d;

        if($g_total <= 0) {
            $perbookingprice = 0;
        } else {
            $perbookingprice = $total_exp / $g_total;
        }


        return view('summary.index',[
            'datas' => $datas,
            'total_t_b' => $total_t_b,
            'total_t_l' => $total_t_l,
            'total_t_d' => $total_t_d,
            'total_exp' => $total_exp,
            'g_total' => $g_total,
            'perbookingprice' => $perbookingprice,
            'year' => $year,
            'monthName' => $monthName,
            'month'=> $month,
            'year'=> $year,
        ]);

    }

    public function balance($id, $balance, $month, $year){


        $date = $year.'-'.$month.'-'.'01';

        $account_exists = Useraccount::where('user_id',$id)->where('fooddate', $date)->count();

        if(!$account_exists){
            $accounts = new Useraccount;
            $accounts->user_id = $id;
            $accounts->fooddate = $date;
            $accounts->foodamount = $balance;
            $accounts->houserentdate = $date;
            $accounts->save();

            Flash::message('আপনার ইনপুট সঠিক ভাবে গ্রহন করা হয়েছে।');
            return redirect('/useraccounts');
        }

        return redirect('/useraccounts')->withErrors('ইতিমধ্যেই আপনি এটা ইনপুট দিয়েছেন!');

    }
}
