<?php

namespace App\Http\Controllers\Backend;

use App\Models\Booking;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        
        
        $search = $request->query('search');

        if($search){
            

        $user = User::where('email', 'LIKE', '%' .$search. '%')->get();
            $user_id = $user->pluck('id');
            if(User::where('email', 'LIKE', '%' .$search. '%')->count() > 0){
            $details = Booking::where('user_id',$user_id)->orderBy('id', 'DESC')->get();
            }else{
            $details = Booking::where('user_id',0)->orderBy('id', 'DESC')->get();

            }
            return view('admin.layout.reportlist',compact('details'));

        
    }


        $details = Booking::with('bookings_seat')->orderBy('id', 'DESC')->get();
        return view('admin.layout.reportlist',compact('details'));
    }

    
    
}
