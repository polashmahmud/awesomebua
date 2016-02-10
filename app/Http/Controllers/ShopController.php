<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Shop;
use Laracasts\Flash\Flash;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::lists('name', 'id');

        $allevents = Shop::all();

        $events = array();
        foreach($allevents as $shop){
            $start = date('Y').'-'.date('m-d',strtotime($shop->shopdate));
            $title = $shop->user->name;
            $color = '#133edb';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color);
        }

        return view('shops.index', [
            'user' => $user,
            'events' => $events,
        ]);
    }

    public function store(Request $request)
    {
        $dates = explode(',',$request->input('shopdate'));

        foreach($dates as $date){
            $shop = new Shop;
            $shop->user_id = $request->user_id;
            $shop->shopdate = $date;
            $shop->save();
        }

        Flash::success('সঠিক ভাবে সম্পন্ন হয়েছে।');
        return redirect()->back();
    }

    public function allshop(){

    }
}