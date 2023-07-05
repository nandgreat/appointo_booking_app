<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarbingSchedule;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CalendyController extends Controller
{
    //
    public function calendlyWebhook(Request $request)
    {

        Log::info($request);

        $currentRequest = $request->all();

        try {

            $barbingSchedule = BarbingSchedule::create([
                "user_id" => 1,
                "customer_name" => $currentRequest['payload']['name'],
                "customer_email" => $currentRequest['payload']['email'],
                "customer_phone" => $currentRequest['payload']['email'],
                "cancel_url" => $currentRequest['payload']['cancel_url'],
                "reschedule_url" => $currentRequest['payload']['reschedule_url'],
                "event_url" => $currentRequest['payload']['reschedule_url'],
                "service_type" => $currentRequest['payload']['scheduled_event']['name'],
                "address" => $currentRequest['payload']['scheduled_event']['location']['location'],
                "start_time" => $currentRequest['payload']['scheduled_event']['start_time'],
                "end_time" => $currentRequest['payload']['scheduled_event']['end_time'],
                "barbing_status_id" => 1,
                "booking_date" => Carbon::now(),
                "booking_amount" => "1000",
            ]);

            return  response()->json(['status' => "00", 'message' => "Schedule added successfully", 'data' => $barbingSchedule]);
        } catch (Exception $e) {
            return  response()->json(['status' => "01", 'message' => "Failed to handle webhook"], 400);
        }
    }
}
