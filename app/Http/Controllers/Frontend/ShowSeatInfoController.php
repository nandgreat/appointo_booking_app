<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\Bookings_seat;
use App\Models\Counter;
use App\Models\Payment;

class ShowSeatInfoController extends Controller
{
    public function showseatinfo($id, $date)
    {
        // dd($id,$date);
        $bookings = Booking::where('trip_id', $id)->get();
        $book = $bookings->pluck('id');
        // dd($book);
        $bookingSeat = Bookings_seat::whereIn('bookings_id', $book)->get();
        $bookedSeat = $bookingSeat->pluck('seat_id');
        // dd($bookedSeat);
        $seat = Seat::whereNotIn('id', $bookedSeat)->get();
        // dd($seat);
        $trip = Trip::find($id);
        $counter_name = Counter::all();
        if ($trip) {
            return view('users.pages.showseatinfo', compact('trip', 'seat', 'counter_name', 'date'));
        }
    }

    public function bookTicket(Request $request)
    {

        if (isset($request->booking_code)) {

            $book = Booking::where('booking_code', $request->booking_code)->first();

            if ($book) {
                $payment = Payment::create([
                    'booking_id' => $book->id,
                    'user_id' => auth()->user()->id,
                    'payment_mathod' => 'card',
                    'transaction_id' => $book->booking_code,
                    'amount' => $book->amount / 2
                ]);

                $book->booking_status_id = 3;
                $book->save();

                return view('users.pages.bookingsuccess', compact('book'));
            } else {
                return redirect()->back()->withErrors("Invalid Booking Code");
            }
        } else {
            $trip = Trip::find($request->trip_id);

            $totalAmount = $trip->price * $request->passengers;
            // dd($trip->price);
            $book = Booking::create([
                'booking_code' => "TN" . rand(10000, 99999),
                'user_id' => auth()->user()->id,
                'trip_id' => $request->trip_id,
                'no_of_passengers' => $request->passengers,
                'booking_status_id' => 2,
                'sub_total' => $totalAmount,
                'date' => $trip->departure_date
            ]);

            $payment = Payment::create([
                'booking_id' => $book->id,
                'user_id' => auth()->user()->id,
                'payment_mathod' => 'card',
                'transaction_id' => $book->booking_code,
                'amount' => $totalAmount / 2,
            ]);

            // dd($key+1);
            $book = Booking::find($book->id);
            $book->update([
                'sub_total' => $totalAmount
            ]);
            return view('users.pages.bookingsuccess', compact('book'));
        }
    }
}
