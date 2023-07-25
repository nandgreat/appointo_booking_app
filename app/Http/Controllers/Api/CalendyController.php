<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarbingSchedule;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CalendyController extends Controller
{
    //
    public function calendlyWebhook(Request $request)
    {

        $currentRequest = $request->all();

        $userEmail = $currentRequest['payload']['tracking']["utm_source"];

        $user = User::where('email', $userEmail)->first();

        if (!$user) {
            return  response()->json(['status' => "01", 'message' => "Failed to User information"], 400);
        }

        $amount = $currentRequest['payload']['tracking']["utm_content"];

        try {

            if ($currentRequest['event'] == "invitee.created") {

                $barbingSchedule = BarbingSchedule::create([
                    "user_id" => $user->id,
                    "customer_name" => $currentRequest['payload']['name'],
                    "customer_email" => $currentRequest['payload']['email'],
                    "customer_phone" => count($currentRequest['payload']['questions_and_answers']) > 0 ? $currentRequest['payload']['questions_and_answers'][0]['answer'] : "",
                    "cancel_url" => $currentRequest['payload']['cancel_url'],
                    "reschedule_url" => $currentRequest['payload']['reschedule_url'],
                    "event_url" => $currentRequest['payload']['event'],
                    "service_type" => $currentRequest['payload']['scheduled_event']['name'],
                    "address" => $currentRequest['payload']['scheduled_event']['location']['location'],
                    "start_time" => $currentRequest['payload']['scheduled_event']['start_time'],
                    "end_time" => $currentRequest['payload']['scheduled_event']['end_time'],
                    "barbing_status_id" => 1,
                    "booking_date" => Carbon::now(),
                    "booking_amount" => $amount,
                ]);

                return response()->json(['status' => "00", 'message' => "Schedule added successfully", 'data' => $barbingSchedule]);
            }

            $eventUrl = $currentRequest['payload']['event'];

            $event = BarbingSchedule::where('event_url', $eventUrl)->first();

            $type = $currentRequest['event'] == "invitee.canceled" ? 4 : 1;

            if ($event) {
                $event->customer_name = $currentRequest['payload']['name'];
                $event->customer_email = $currentRequest['payload']['email'];
                $event->customer_phone = $currentRequest['payload']['questions_and_answers'][0]['answer'];
                $event->cancel_url = $currentRequest['payload']['cancel_url'];
                $event->reschedule_url = $currentRequest['payload']['reschedule_url'];
                $event->event_url = $currentRequest['payload']['event'];
                $event->service_type = $currentRequest['payload']['scheduled_event']['name'];
                $event->address = $currentRequest['payload']['scheduled_event']['location']['location'];
                $event->start_time = $currentRequest['payload']['scheduled_event']['start_time'];
                $event->end_time = $currentRequest['payload']['scheduled_event']['end_time'];
                $event->barbing_status_id = $type;
                $event->save();
            } else {
                return response()->json(['status' => "02", 'message' => "No such schedule exists"], 400);
            }
        } catch (Exception $e) {
            logInfo($e->getMessage());
            return  response()->json(['status' => "02", 'message' => "Failed to handle webhook"], 400);
        }
    }
}
