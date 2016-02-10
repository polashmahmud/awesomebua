<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use Laracasts\Flash\Flash;
use Auth;
use App\Item;
use Carbon\Carbon;

class AccountController extends Controller
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
        $price = Account::whereMonth('accountdate', '=', date('m'))
            ->where('user_id', Auth::user()->id)
            ->sum('amount');

        $items = Item::lists('item','item');
        $itemname = Item::all();
        $accounts = Account::where('user_id', Auth::user()->id)
            ->orderBy('accountdate', 'desc')
            ->paginate(10);

        return view('accounts.index', [
            'accounts' => $accounts,
            'items' => $items,
            'itemname' => $itemname,
            'price' => $price,
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

        $this->validate($request, [
           'accountdate' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        $description = implode(", ", $request->description);

        $request->user()->accounts()->create([
            'accountdate' => $request->accountdate,
            'description' => $description,
            'amount' => $request->amount,
        ]);

        Flash::success('আপননার বাজারের নির্দেশনা গ্রহণ করা হয়েছে!');

        return redirect('/account');
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
        $account = Account::findOrfail($id);
        $itemname = Item::all();

        return view('accounts.edit', ['account' => $account, 'itemname' => $itemname]);
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
        $this->validate($request, [
            'accountdate' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        $account = Account::findorFail($id);
        $account->accountdate = $request->accountdate;
        $account->description = $request->description;
        $account->amount = $request->amount;

        $account->save();

        Flash::success('আপননার বাজারের নির্দেশনা গ্রহণ করা হয়েছে!');
        return redirect('account');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrfail($id);
        $account->delete();

        Flash::error('আপনি সফল ভাবে ডিলিট করেছেন!');

        return redirect('/account');

    }

    public function itemstore(Request $request)
    {
        $this->validate($request, [
            'item' => 'required|unique:items',
        ]);

        Item::create([
            'item' => $request->item,
        ]);

        Flash::success('আইটেম সঠিক ভাবে ইনপুট দেওয়া হয়েছে!');

        return redirect()->back();
    }
}
