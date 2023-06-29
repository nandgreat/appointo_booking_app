<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use App\Models\User;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class registrationcontroller extends Controller
{
    public function registrationshow()
    {
        return view('users.pages.registration');
    }
    public function loginshow()
    {
        return view('users.pages.login');
    }

    
    public function bookBarbingShow()
    {
        return view('users.pages.registration');
    }


    public function userstore(Request $request)
    {
        // dd($request->all());


        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->all()[0]);
        }


        User::Create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,

        ]);
        return redirect()->back()->with('message', 'Congratulations, Registration Successful');
    }

    public function loginPost(Request $request)
    {
        // dd($request->all());


        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->all()[0]);
        }

        $userpost = $request->except('_token');
        // dd(Auth::attempt($userpost));
        if (Auth::attempt($userpost)) {
            return redirect()->route('frontend.user');
        } else {
            Session::flash("error", 'Invalid username or password');

            return redirect()->route('loginshow');
        }
    }

    public function processForgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with("error", "Invalid Email Provided");
        }

        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to($user->email)->send(new ForgotPasswordMail($mailData));


        return redirect()->back()->with("success", "Recovery Email sent successfully");
    }

    public function forgotPassword(Request $request)
    {
        // dd($request->all());


        return view('users.pages.forgotpassword');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.user');
    }
}
