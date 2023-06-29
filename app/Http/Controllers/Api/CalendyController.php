<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarbingSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CalendyController extends Controller
{
    //
    public function calendlyWebhook(Request $request)
    {

        Log::info($request);

        $currentRequest = $request->all();

        $barbingSchedule = BarbingSchedule::create([
            "user_id" => 1,
            "customer_name" => $currentRequest['payload']['name'],
            "customer_email" => $currentRequest['payload']['email'],
            "customer_phone" => $currentRequest['payload']['email'],
            "cancel_url" => $currentRequest['payload']['cancel_url'],
            "reschedule_url" => $currentRequest['payload']['reschedule_url'],
            "event_url" => $currentRequest['payload']['reschedule_url'],
            "start_time" => $currentRequest['payload']['scheduled_event']['start_time'],
            "end_time" => $currentRequest['payload']['scheduled_event']['end_time'],
            "barbing_status_id" => 1,
            "booking_date" => Carbon::now(),
            "booking_amount" => "1000",
        ]);

        return  response()->json(['status' => "00", 'message' => "Schedule added successfully", 'data' => $barbingSchedule]);
    }
}
