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
        $data = Notification::latest('id')->where('cid', Auth::user()->id)->get();
        
        Notification::where('cid', Auth::user()->id)->where('notified_at', '<=', Carbon::now())->update(['seen_status' => 'seen']);
        
        return $data;
    }
}
