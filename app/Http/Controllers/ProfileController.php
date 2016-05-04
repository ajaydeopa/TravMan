<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userdetail;
use Auth;

class ProfileController extends Controller
{
    //open profile page
    public function show(){
    	$id = Auth::user()->id;

    	$data = Userdetail::where('cid', $id)->first();
    	return view('pages.profile', compact('data'));
    }

    //save summary
    public function summarysave(Request $request){
    	$id = Auth::user()->id;
    	$summ = $request->summary;

    	Userdetail::where('cid', $id)->update(['summary' => $summ]);
    }

    //save name, gender, birthday, martial status
    public function basicinfosave(Request $request){
        $id = Auth::user()->id;
        $name = $request->name;
        $gender = $request->gender;
        $birth = $request->birthday;
        $status = $request->martial_status;

        Userdetail::where('cid', $id)->update(['full_name' => $name, 'gender' => $gender, 'birthday' => $birth, 'martial_status' => $status]);
    }

    //save contact info
    public function contactinfosave(Request $request){
        $id = Auth::user()->id;
        $phone = $request->phone;

        Userdetail::where('cid', $id)->update(['phone' => $phone]);
    }
}
