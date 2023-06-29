<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ShowBookingInfoController extends Controller
{
    public function showbookinginfo()
    {
        $details = Booking::with('bookings_seat')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        // dd($details);
        // dd(auth()->user());
        return view('users.pages.showbookinginfo', compact('details'));
    }
    public function showTripInfo(Request $request)
    {
        $details = Trip::with('bus')->find($request->trip_id);
        $passengers = $request->passengers;
        // dd($details);
        // dd(auth()->user());
        return view('users.pages.showtripinfo', compact('details', 'passengers'));
    }
    public function showBookingSuccess(Request $request)
    {
        return view('users.pages.bookingsuccess');
    }
    public function showPaymentPage(Request $request)
    {
        $details = Trip::with('bus')->find($request->trip_id);
        $passengers = $request->passengers;
        $booking_code = isset($request->booking_code) ? $request->booking_code : '';
        $amount = $request->amount;
        return view('users.pages.paymentpage', compact('details', 'passengers', 'booking_code', 'amount'));
    }
    public function bookingCodePage(Request $request)
    {
        $details = Trip::with('bus')->find($request->trip_id);
        $passengers = $request->passengers;
        $amount = $request->amount;
        return view('users.pages.booking_code_page', compact('details', 'passengers', 'amount'));
    }

    public function checkinPage(Request $request)
    {
        $details = Trip::with('bus')->find($request->trip_id);
        $passengers = $request->passengers;
        $amount = $request->amount;
        return view('users.pages.checkin', compact('details', 'passengers', 'amount'));
    }

    public function uploadTravelDocuments(Request $request)
    {
        $booking = Booking::where('booking_code', $request->booking_code)->first();

        if ($booking) {

            if ($request->hasFile('travel_document')) {
                $image = $request->file('travel_document');

                $imageContents = file_get_contents($image->getRealPath());
                $base64Image = base64_encode($imageContents);

                $booking->travel_document = $base64Image;
                $booking->save();

                return redirect()->back()->with('success', 'Travel Documents uploaded successfully');
            }

            return redirect()->back()->with('error', 'No Image file found');
        } else {
            return redirect()->back()->with('error', 'Booking Code not found');
        }
    }

    public function showInstallmentalPaymentPage(Request $request)
    {
        $details = Trip::with('bus')->find($request->trip_id);
        $passengers = $request->passengers;
        $amount = $details->price * $passengers;
        $booking_status = 1;

        $installDetails = [
            [
                'count' => 1,
                'installment' => 'Down payment',
                'amount' => $amount / 2,
                'payday' => "Today"
            ],
            [
                'count' => 2,
                'installment' => 'Final Payment',
                'amount' => $amount / 2,
                'payday' => Carbon::now()->addDays(10)->toFormattedDateString()
            ],
        ];

        // print_r($details);
        // die();

        return view('users.pages.installmentalpaymentpage', compact('details', 'booking_status', 'passengers', 'installDetails', 'amount'));
    }
    public function showInstallmentalPaymentCodePage(Request $request)
    {

        if (!isset($request->booking_code)) {
            return redirect()->back()->with('error', 'Kindly Enter a booking code');
        }

        $booking = Booking::where('booking_code', $request->booking_code)->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'Invalid booking code entered');
        }

        $details = $booking->trip;
        $booking_code = $booking->booking_code;
        $passengers = $booking->no_of_passengers;
        $amount = $booking->sub_total;
        $booking_status = $booking->booking_status_id;

        $installDetails = [
            [
                'count' => 1,
                'installment' => 'Down payment',
                'amount' => $amount / 2,
                'payday' => "Paid"
            ],
            [
                'count' => 2,
                'installment' => 'Final Payment',
                'amount' => $amount / 2,
                'payday' => $booking_status == 2 ? "Pay Now" : "Paid"
            ],
        ];

        // print_r($details);
        // die();

        return view('users.pages.installmentalpaymentpage', compact('details', 'booking_status', 'booking_code', 'installDetails', 'passengers', 'amount'));
    }

    public function viewinfo($id)
    {
        $detail = Booking::find($id);

        return view('users.pages.viewinfo', compact('detail'));
    }
}
