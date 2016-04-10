<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class MemberController extends Controller
{
    //
    public function createMember(Request $request){
        $store = new User;
        $store->company_id = Auth::user()->company_id;
        $store->user_name = $request->user_name;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->flag = 2;
        $store->save();
    }
}
