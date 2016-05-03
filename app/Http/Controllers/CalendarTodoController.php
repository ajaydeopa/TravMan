<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Calendar;
use App\TodoList;
use Carbon\Carbon;

class CalendarTodoController extends Controller
{
    //open dashboard
	public function load(){
		$id = Auth::user()->id;

		$events = Calendar::where('cid', $id)->get();

        $todo = TodoList::latest('updated_at')->where('cid', $id)->get();

		return view('pages.dashboard', compact('events', 'todo'));
	}

    //save calendar appointment
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

    //save todo list data
    public function addtodo(Request $request){
        $todo = $request->new_todo;
        $id = Auth::user()->id;

        $todosave = new TodoList;
        $todosave->cid = $id;
        $todosave->todo = $todo;
        $todosave->updated_at = Carbon::now();
        $todosave->save();

        $data = $this->getTodoData();

        return $data;
    }

    //delete specific todo
    public function deletetodo(Request $request){
        $id = $request->id;

        TodoList::find($id)->delete();

        $data = $this->getTodoData();

        return $data;
    }

    //retrive todo after deletion
    public function getTodoData(){
        $id = Auth::user()->id;

        return TodoList::latest('updated_at')->where('cid', $id)->get();
    }

    //edit a todo
    public function edittodo(Request $request){
        $id = $request->id;
        $data = $request->data;

        TodoList::find($id)->update(['todo' => $data, 'updated_at' => Carbon::now()]);
    }
}
