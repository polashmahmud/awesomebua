<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Useraccount;
use Laracasts\Flash\Flash;

class UseraccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(){

        $accounts = Useraccount::orderBy('id','desc')->paginate(15);

        return view('useraccounts.index', compact('accounts'));
    }

    public function edit($id){

        $account = Useraccount::findOrfail($id);

        return view('useraccounts.edit', compact('account'));
    }

    public function update(Request $request, $id){

        $account = Useraccount::findOrfail($id);

        $account->houserentdate = $request->houserentdate;
        $account->houserent = $request->houserent;
        $account->internetbill = $request->internetbill;
        $account->utlitybill = $request->utlitybill;
        $account->buabill = $request->buabill;
        $account->pay = $request->pay;

        $account->save();

        Flash::info('সঠিক ভাবে আপডেট হয়েছে।');
        return redirect('/useraccounts');
    }
}
