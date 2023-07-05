<?php

namespace App\Http\Controllers;

use App\Models\BarbingSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookBarbingController extends Controller
{

    public function bookBarbing(Request $request)
    {
        $service_type = "salon";
        $amount = "2000";

        if ($request->has('service_type')) {
            if ($request->service_type == "home") {
                $service_type = $request->service_type;
                $amount = "7000";
            }
        }

        return view('users.pages.book_barbing', compact('service_type', 'amount'));
    }

    public function myBookings(Request $request)
    {
        $bookings = BarbingSchedule::with('status')->where('user_id', auth()->user()->id)->get();

        Log::info($bookings);

        return view('users.pages.mybookings', compact('bookings'));
    }
}
