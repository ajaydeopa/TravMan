<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DayItenary;
use App\EventItenary;

class ItenaryController extends Controller
{	//open itenary page
	public function show($id){
		//to get days data
		$days = DayItenary::where('pack_id', $id)->get();

		$days_count = DayItenary::where('pack_id', $id)->count();

		$day1_id = 0;
		$events = [];
		if( $days_count != 0 ){
			$day1_id = DayItenary::where('pack_id', $id)->where('day_no', 'Day 1')->first()->id;

			//to get event data
			$events = EventItenary::where('day_id', $day1_id)->get();
		}

		return view('pages.itenary', compact('id', 'days', 'days_count', 'day1_id', 'events'));
	}

    //to save new added day
    public function saveDay(Request $request){
    	$day = $request->day;

    	$store = new DayItenary;
    	$store->pack_id = $request->id;
    	$store->day_no = 'Day '. $day;
    	$store->save();

    	$id = $store->id;

    	return $id;
    }

    //save event
    public function saveEvent(Request $request){
    	$day = DayItenary::find( $request->day );

    	$store = new EventItenary;
    	$store->pack_id = $day->pack_id;
    	$store->day_id = $day->id;
    	$store->title = $request->title;
    	$store->time = $request->time;
    	$store->notes = $request->note;
    	$store->save();
    }

    //show day events
    public function showEvents(Request $request){
    	$id = $request->id;

    	$data = EventItenary::where('day_id', $id)->get();

    	return $data;
    }

    //show itenary
    public function showItinerary($rand_id){
    	$id = floor((int)substr($rand_id, 3) / 1000);

    	$days = DayItenary::where('pack_id', $id)->get();
//    	$no_of_days = $days->count();

    	$day_event = [];
    	$i = 0;

    	foreach( $days as $d ){
    		$day_id = $d->id;

    		$day_event[$i] = EventItenary::where('day_id', $day_id)->get();

    		$i++;
    	}

    	return view('pages.showitinerary', compact('day_event'));
    }
}
