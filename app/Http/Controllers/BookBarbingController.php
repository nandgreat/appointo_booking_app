<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookBarbingController extends Controller
{
        
    public function bookBarbing()
    {
        return view('users.pages.book_barbing');
    }

}
