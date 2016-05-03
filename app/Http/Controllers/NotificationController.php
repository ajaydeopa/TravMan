<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notification;
use Carbon\Carbon;
use Auth;

class NotificationController extends Controller
{
    public function countNotification(){
        $count = Notification::where('cid', Auth::user()->id)->where('seen_status', 'unseen')->get()->count();
        return $count;
    }
    
    public function show(){
        Notification::where('cid', Auth::user()->id)->where('notified_at', '<=', Carbon::now())->update(['seen_status' => 'open']);

        $data = Notification::latest('id')->where('cid', Auth::user()->id)->get();

        return $data;
    }

    public function details(Request $request){
    	$id = $request->id;
    	$data = Notification::find($id);

    	Notification::find($id)->update(['seen_status' => 'seen']);

    	if( $data->booking_status === 'booked' )
    		return $data->email_of_booker.' has made a booking . To see full details go to show booking section !!!';
    	else
    		return $data->email_of_booker.' has cancelled booking !!!';
    }
}
