<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    
    Route::get('/',[
        'middleware' => 'guest', function(){
            return view('pages.index');        
    }]);
    
    Route::group(['middleware' => 'auth'], function () {
        //redirect to dashboard to loged in user
        Route::get('dashboard', function(){
            return view('pages.dashboard');        
        });
        
        Route::get('booking', function(){
            return view('pages.booking');
        });
        
         Route::get('profile', function(){
            return view('pages.profile');
        });
        Route::get('create', function(){
            return view('pages.memberRegister');
        });
        
        Route::get('count', 'NotificationController@countNotification');
        
        //Route::get('cm', 'MemberController@cm');
        
        Route::get('showNotifications', 'NotificationController@show');
        
        Route::post('checkbooking', 'BookingController@checkBooking');
        
        Route::post('make_booking', 'BookingController@makeBooking');
        
        Route::post('create_member', 'MemberController@createMember');
    });
});
