<?php

namespace App\Http\Controllers;
use Request;
use App\Feed;
use Requests;
use DB;
use Illuminate\Http\RedirectResponse;
use Redirect;
use View;

class MicroController extends Controller
{

    public function feedbacks($id)
    {
    $input = Request::all();
    $feed= new Feed;
   $feed->name= $input['name'];
   $feed->email= $input['email'];
    $feed->message= $input['message'];
    $feed->cid= $id;
     return redirect('micro/1');
  }

    public function detail($id)
    {
        $user = DB::table('userdetails')->where('cid', $id)->first();
        $name = DB::table('userdetails')->where('cid', $id)->first()->full_name;
        $galery = DB::table('galleries')->where('company_id', $id)->take(12)->get();
        $packages = DB::table('packages')->where('company_id', $id)->take(2)->get();

        //$name = $this->name;

        return view('pages.microsite',compact('user','packages','galery','name'));
  //      return Redirect::route( 'micro' )->with('id', 'gjhghj');

    }
/*    public function micro()
    {
        $h = Session::get('id');
        return $h;
    }*/

    public function more($id)
    {   $name = DB::table('userdetails')->where('cid', $id)->first()->full_name;
                $packages = DB::table('packages')->where('company_id', $id)->get();
        return view('pages.morepackage',compact('packages','name'));


    }
    public function galery($id)
    {   $name = DB::table('userdetails')->where('cid', $id)->first()->full_name;


        $galery = DB::table('galleries')->where('company_id', $id)->get();
        return view('pages.galery',compact('galery','name'));


    }
public function package($id)
    {

        $n = DB::table('packages')->where('id', $id)->first()->company_id;
        $name = DB::table('userdetails')->where('cid', $n)->first()->full_name;
        $packages = DB::table('packages')->where('id', $id)->first();
        return view('pages.packagedetails',compact('packages','name'));


    }
}
