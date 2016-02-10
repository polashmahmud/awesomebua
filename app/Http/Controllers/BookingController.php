<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Booking;
use Auth;
use Flash;
use Carbon\Carbon;
use DB;

class BookingController extends Controller
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
    public function index(Request $request)
    {
        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;
        $currentmonthbreakfast = Booking::where('user_id', $request->user()->id)
                                ->whereMonth('bookingdate', '=', $month)
                                ->whereYear('bookingdate', '=', $year)
                                ->where('breakfast', '=', 'on')->count();
        $currentmonthlunch = Booking::where('user_id', $request->user()->id)
                                ->whereMonth('bookingdate', '=', $month)
                                ->whereYear('bookingdate', '=', $year)
                                ->where('lunch', '=', 'on')->count();
        $currentmonthdinner = Booking::where('user_id', $request->user()->id)
                                ->whereMonth('bookingdate', '=', $month)
                                ->whereYear('bookingdate', '=', $year)
                                ->where('dinner', '=', 'on')->count();
        $totalbooking = $currentmonthbreakfast + $currentmonthlunch + $currentmonthdinner;

        $bookings = Booking::where('user_id', $request->user()->id)
                    ->orderBy('bookingdate', 'desc')
                    ->paginate(13);

        $eventsbreakfast = Booking::where('user_id', $request->user()->id)->where('breakfast', 'on')->get();
        $eventslunch = Booking::where('user_id', $request->user()->id)->where('lunch', 'on')->get();
        $eventsdinner = Booking::where('user_id', $request->user()->id)->where('dinner', 'on')->get();

        $events = array();
        foreach($eventsbreakfast as $booking){
            $start = date('Y').'-'.date('m-d',strtotime($booking->bookingdate));
            $title = 'Breakfast: '.$booking->breakfast;
            $color = '#468847';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color);
        }

        foreach($eventslunch as $booking){
            $start = date('Y').'-'.date('m-d',strtotime($booking->bookingdate));
            $title = 'Lunch: '.$booking->lunch;
            $color = '#b94a48';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color);
        }

        foreach($eventsdinner as $booking){
            $start = date('Y').'-'.date('m-d',strtotime($booking->bookingdate));
            $title = 'Dinner: '.$booking->dinner;
            $color = '#3a87ad';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color);
        }

        return view('booking.index', [
            'bookings'              => $bookings,
            'currentmonthbreakfast' => $currentmonthbreakfast,
            'currentmonthlunch'    => $currentmonthlunch,
            'currentmonthdinner'   => $currentmonthdinner,
            'totalbooking'         => $totalbooking,
            'events'               => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bookingdate' => 'required',
        ]);

        $dates = explode(',',$request->input('bookingdate'));

        if($request->input('breakfast')){
            $breakfast= 'on';
        }
        else $breakfast= 'off';

        if($request->input('lunch')){
            $lunch= 'on';
        }
        else $lunch= 'off';

        if($request->input('dinner')){
            $dinner= 'on';
        }
        else $dinner= 'off';

        foreach($dates as $date){
                $booking = new Booking;
                $booking->bookingdate = $date;
                $booking->user_id = Auth::user()->id;
                $booking->breakfast = $breakfast;
                $booking->lunch = $lunch;
                $booking->dinner = $dinner;
                $booking->save();
        }

        Flash::success('আপননার খাবারের নির্দেশনা গ্রহণ করা হয়েছে!');

        return redirect('/booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking =Booking::findOrfail($id);

        return view('booking.edit', ['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrfail($id);

        if($request->input('breakfast')){
            $breakfast= 'on';
        }
        else $breakfast= 'off';

        if($request->input('lunch')){
            $lunch= 'on';
        }
        else $lunch= 'off';

        if($request->input('dinner')){
            $dinner= 'on';
        }
        else $dinner= 'off';

        $booking->breakfast = $breakfast;
        $booking->lunch = $lunch;
        $booking->dinner = $dinner;
        $booking->save();

        Flash::success('আপনি সঠিক ভাবে খাবার নির্দেশনা সম্পাদন করেছেন।');
        return redirect('/booking');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        Flash::error('আপনি সঠিক ভাবে খাবার নির্দেশনা বাতিল করেছেন।');
        return redirect('/booking');
    }
}
