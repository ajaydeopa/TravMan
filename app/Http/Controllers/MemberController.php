<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use Auth;

class MemberController extends Controller
{
    public function validatemember(Request $request){
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|max:20|alpha',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6',
        ]);

        if( $validator->errors()->has('user_name') )
            $d['name'] = $validator->errors()->first('user_name');
        else
        {   $d['name'] = 'no';

            if( $validator->errors()->has('email') )
                $d['email'] = $validator->errors()->first('email');
            else
            {   $d['email'] = 'no';

                if( $validator->errors()->has('password') )
                    $d['password'] = $validator->errors()->first('password');
                else
                    $d['password'] = 'no';
            }
        }

        return $d;
    }

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
