<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.index', ['users' => $users]);
    }

    public function active($id)
    {
        $user = User::findOrfail($id);

        if($user->active == 1){ $active = 0; }
        if($user->active == 0){ $active = 1; }

        $user->active = $active;
        $user->save();

        Flash::success('সঠিক ভাবে সম্পন্ন হয়েছে।');
        return redirect()->back();
    }

    public function password($id)
    {
        $user = User::findOrfail($id);

        $user->password = bcrypt(123456789);
        $user->save();

        Flash::success('সঠিক ভাবে সম্পন্ন হয়েছে। পাসওয়ার্ডঃ 123456789');
        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::findOrfail($id);

        if($user->admin == 1){ $admin = 0; }
        if($user->admin == 0){ $admin = 1; }

        $user->admin = $admin;
        $user->save();

        Flash::success('সঠিক ভাবে সম্পন্ন হয়েছে।');
        return redirect()->back();
    }


}
