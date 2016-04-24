<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Calendar;

class CalendarTodoController extends Controller
{
    //
	public function load(){
		$id = Auth::user()->id;

		$events = Calendar::where('cid', $id)->get();

		return view('pages.dashboard', compact('events'));
	}


    public function eventsave(Request $request){
    	$id = Auth::user()->id;
    	$event = $request->event;
    	$color = $request->color;
    	$strt = $request->strt;
    	$monthname = substr($strt, 4,3);
    	$month = 0;

    	if( $monthname === 'Feb' )
    		$month = 1;
    	else if( $monthname === 'Mar' )
    		$month = 2;
    	else if( $monthname === 'Apr' )
    		$month = 3;
    	else if( $monthname === 'May' )
    		$month = 4;
    	else if( $monthname === 'Jun' )
    		$month = 5;
    	else if( $monthname === 'Jul' )
    		$month = 6;
    	else if( $monthname === 'Aug' )
    		$month = 7;
    	else if( $monthname === 'Sep' )
    		$month = 8;
    	else if( $monthname === 'Oct' )
    		$month = 9;
    	else if( $monthname === 'Nov' )
    		$month = 10;
    	else if( $monthname === 'Dec' )
    		$month = 11;

    	$store = new Calendar;
    	$store->cid = $id;
    	$store->event_name = $event;
    	$store->color = $color;
    	$store->month = $month;
    	$store->year = substr($strt, 11,4);
    	$store->day = substr($strt, 8,2);
    	$store->save();
    }
}
