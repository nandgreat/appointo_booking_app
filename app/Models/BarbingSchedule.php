<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarbingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "customer_name",
        "customer_email",
        "customer_phone",
        "cancel_url",
        "reschedule_url",
        "event_url",
        "start_time",
        "end_time",
        "barbing_status_id",
        "booking_amount",
        "booking_date"
    ];

    public function status()
    {
        return $this->hasOne(BarbingStatus::class, 'id', 'barbing_status_id');
    }
}
