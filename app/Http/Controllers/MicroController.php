<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Http\RedirectResponse;
use Session;
use Redirect;

class MicroController extends Controller
{
    public function detail($id)
    {
        $user = DB::table('userdetails')->where('cid', $id)->first();
        $galery = DB::table('galleries')->where('company_id', $id)->take(12)->get();
        $packages = DB::table('packages')->where('company_id', $id)->take(2)->get();

        return view('pages.microsite',compact('user','packages','galery'));
  //      return Redirect::route( 'micro' )->with('id', 'gjhghj');

    }
/*    public function micro()
    {
        $h = Session::get('id');
        return $h;
    }*/

    public function more($id)
    {

        $packages = DB::table('packages')->where('company_id', $id)->get();
        return view('pages.morepackage',compact('packages'));


    }
    public function galery($id)
    {

        $galery = DB::table('galleries')->where('company_id', $id)->get();
        return view('pages.galery',compact('galery'));


    }
public function package($id)
    {

        $packages = DB::table('packages')->where('id', $id)->first();
        return view('pages.packagedetails',compact('packages'));


    }
}
