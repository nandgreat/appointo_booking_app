<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function userform()
    {
        $data=User::all();
        return view('admin.layout.userform',compact('data'));
    }

    public function forgotPassword()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('your_email@gmail.com')->send(new ForgotPasswordMail($mailData));
           
        dd("Email is sent successfully.");
    }

  
}
