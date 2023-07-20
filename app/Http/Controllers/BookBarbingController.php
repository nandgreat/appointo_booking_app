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
        if (auth()->user()->role == "user") {
            $bookings = BarbingSchedule::with('status')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        } else {
            $bookings = BarbingSchedule::with('status')->orderBy('id', 'desc')->get();
        }

        Log::info($bookings);

        if (auth()->user()->role == "user")
            return view('users.pages.mybookings', compact('bookings'));
        else
            return view('users.pages.manage_booking', compact('bookings'));
    }

    public function bookingOptions(Request $request)
    {
        if (auth()->user()->role == "user") {
            $bookings = BarbingSchedule::with('status')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        } else {
            $bookings = BarbingSchedule::with('status')->orderBy('id', 'desc')->get();
        }

        Log::info($bookings);

        if (auth()->user()->role == "admin")
            return view('users.pages.show_book_barbing_options');
        else
            return view('users.pages.manage_booking', compact('bookings'));
    }

    public function markComplete(Request $request)
    {

        if ($request->has("schedule_id")) {
            $schedule = BarbingSchedule::where('id', $request->schedule_id)->first();

            if (!$schedule) {
                return redirect()->back()->with('error', 'Invalid Schedule Id');;
            }

            $schedule->barbing_status_id = 3;
            $schedule->save();

            return redirect()->back()->with('success', 'Barbing Has been completed by customer');;
        } else {
            return redirect()->back()->with('error', 'No Schedule Id specified');;
        }

        if (auth()->user()->role == "user")
            return view('users.pages.mybookings', compact('bookings'));
        else
            return view('users.pages.manage_booking', compact('bookings'));
    }
}
