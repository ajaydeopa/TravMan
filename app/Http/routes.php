<?php
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
//Route::get('micro','MicroController@micro') ;
//Route::get('micro', array('as' => 'micro', 'uses' => 'MicroController@micro'));
        Route::get('validateSubmit', 'MicroController@feedbacks');

        Route::get('savefeed', 'MicroController@storeFeed');

        Route::get('micro/{id}','MicroController@detail') ;

        Route::get('morepackage/{id}','MicroController@more' );

        Route::get('packagedetails/{id}','MicroController@package');

        Route::get('galery/{id}', 'MicroController@galery');





Route::group(['middleware' => 'web'], function () {
    Route::auth();
    
    Route::get('/',[
        'middleware' => 'guest', function(){
            return view('pages.index');        
    }]);
    
    Route::group(['middleware' => 'auth'], function () {

        Route::get('createpackage', function(){
            return view('pages.createpackage');
        });


        Route::get('create', function(){
            return view('pages.memberRegister');
        });

        //Route for addPhotos
         Route::get('addphotos', function(){
            return view('pages.addphotos');
        });
        Route::post('savephotos', 'PhotosController@save');


        //Route for PackageController
        Route::post('savepackage', 'PackageController@save');

        Route::get('getduration', 'PackageController@getduration');

        Route::post('validatePackage', 'PackageController@validatePackage');

        //Route for ProfileController
        Route::get('profile', 'ProfileController@show');

        Route::post('summarysave', 'ProfileController@summarysave');

        Route::post('basicinfosave', 'ProfileController@basicinfosave');

        Route::post('contactinfosave', 'ProfileController@contactinfosave');
        
        //Route for MemberController
        Route::post('create_member', 'MemberController@createMember');

        Route::post('validatemember', 'MemberController@validatemember');

        //Route for NotificationController
        Route::get('count', 'NotificationController@countNotification');

        Route::get('showNotifications', 'NotificationController@show');

        Route::get('notificationdetail', 'NotificationController@details');
        //Route for BookingController
        Route::get('booking', 'BookingController@show');

        Route::get('showbookings', 'BookingController@allbookings');

        Route::get('cancel', 'BookingController@cancel');

        Route::get('booking/{id}', 'BookingController@showbooking');
        
        Route::post('checkbooking', 'BookingController@checkBooking');
        
        Route::post('make_booking', 'BookingController@makeBooking');
        


        //Route for CalendarTodoController
        Route::get('eventsave', 'CalendarTodoController@eventsave');

        Route::get('dashboard', 'CalendarTodoController@load');

        Route::post('addtodo', 'CalendarTodoController@addtodo');

        Route::get('deletetodo', 'CalendarTodoController@deletetodo');

        Route::get('edittodo', 'CalendarTodoController@edittodo');
    });
});

