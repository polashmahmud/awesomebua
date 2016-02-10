<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Flash;
use App\User;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'nickname' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|max:20|unique:users',
            'picture' => 'mimes:jpeg,png|max:1000',
            'room_id' => 'required|max:4',
            'password' => 'required|confirmed|min:6',
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->room_id = $request->room_id;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('picture')) {

            $file = $request->file('picture');

            $name = time() . '-' . $file->getClientOriginalName();

            $file = $file->move(public_path(). '/images/', $name);

            $user->picture = $name;

        }

        $user->save();
        Flash::success('আপনাকে অভিনন্দন! আপনি সঠিক ভাবে নিবন্ধিত করেছেন কিন্তু আপনার আইডিটি ডিজেবল আছে। দয়া করে অসাম বুয়া ম্যানেজারের সাথে যোগাযোগ করুন!');
        return redirect('/login');

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    	$nickname = $request->nickname;
    	$password = $request->password;

        $remember = ($request->input('remember')) ? true : false;

         if (Auth::attempt(['nickname' => $nickname, 'password' => $password, 'active' => 1],$remember)) {

            Flash::success('আপনি সঠিক ভাবে লগিন করেছেন!');
            return redirect('/');

        }

        if (Auth::attempt(['email' => $nickname, 'password' => $password, 'active' => 1],$remember)) {

            Flash::success('আপনি সঠিক ভাবে লগিন করেছেন!');
            return redirect('/');

        }

        if (Auth::attempt(['id' => $nickname, 'password' => $password, 'active' => 1],$remember)) {

            Flash::success('আপনি সঠিক ভাবে লগিন করেছেন!');
            return redirect('/');

        }

        if (Auth::attempt(['phone' => $nickname, 'password' => $password, 'active' => 1],$remember)) {

            Flash::success('আপনি সঠিক ভাবে লগিন করেছেন!');
            return redirect('/');

        }

        if (Auth::viaRemember()) {
            return redirect('/');
        }

        Flash::success('আপনার ইউজার নেম, পাসওয়ার্ড ভুল অথবা আপনার একাউন্টটি ডিজেবল করা আছে। আপনি যদি রেজিস্ট্রেশন করে থাকেন তাহলে একাউন্ট একটিভ করার জন্য অসাম বুয়া ম্যানেজারের সাথে যোগাযোগ করুন');
        return redirect('/login');

    }

    public function userlist()
    {
        $totaluser = User::where('active', 1)->count();
        $userlist = User::orderBy('room_id', 'asc')->get();
        return view('auth.userlist', [
            'userlist' => $userlist,
            'totaluser' => $totaluser,
        ]);
    }

    public function logout()
    {
        Auth::logout();

        Flash::success('আপনি সঠিক ভাবে প্রস্থান করেছেন!');
        return redirect('/login');
    }

    public function useredit($id)
    {
        $user = User::findOrfail($id);

        return view('auth.profile', ['user' => $user]);
    }

    public function profile(Request $request, $id)
    {
        $this->validate($request,[
            'picture' => 'mimes:jpeg,png|max:1000',
        ]);

        $profile = User::findOrfail($id);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');

            $name = time() . '-' . $file->getClientOriginalName();

            $file = $file->move(public_path(). '/images/', $name);

            $profile->picture = $name;
        }

        $profile->name = $request->name;
        $profile->room_id = $request->room_id;

        $profile->save();

        Flash::success('আপনি সঠিক ভাবে সম্পাদন করেছেন!');
        return redirect()->back();
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $id = Auth::user()->id;

        $password = User::findOrfail($id);
        $password->password = bcrypt($request->password);
        $password->save();

        Flash::success('আপনি সঠিক ভাবে সম্পাদন করেছেন!');
        return redirect()->back();
    }

}
