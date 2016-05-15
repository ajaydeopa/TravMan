<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userdetail;
use Auth;
use DB;

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
        $company = $request->company_name;

        Userdetail::where('cid', $id)->update(['full_name' => $name, 'gender' => $gender, 'birthday' => $birth, 'martial_status' => $status, 'company_name' => $company]);
    }

    //save contact info
    public function contactinfosave(Request $request){
        $id = Auth::user()->id;
        $phone = $request->phone;

        Userdetail::where('cid', $id)->update(['phone' => $phone]);
    }

     public function profilephotosave(Request $request){
        $id = Auth::user()->id;
        $phone = $request->feedback;
         Userdetail::where('cid', $id)->update(['pic' => $phone]);
    }

     public function updatephoto(Request $request){
        $id = Auth::user()->id;
        $cid = Auth::user()->company_id;
        $destinationPath= "/assets/images/profile";
        $extension = $request->file->getClientOriginalExtension();
        $str = str_random(4);
        $filename = Auth::user()->company_id.$str.".{$extension}";
        //$size = $file->getSize();
        $upload_success = $request->file->move(public_path().'/'.$destinationPath, $filename);
        $url=$destinationPath.'/'. $filename;
         Userdetail::where('cid', $id)->update(['pic' => $url]);
    }

}
