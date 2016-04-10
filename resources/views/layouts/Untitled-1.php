
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>



        <!-- Vendor CSS -->
        <link href="{{URL::to('assets')}}/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="{{URL::to('assets')}}/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="{{URL::to('assets')}}/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="{{URL::to('assets')}}/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="{{URL::to('assets')}}/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="{{URL::to('assets')}}/css/app.min.1.css" rel="stylesheet">
        <link href="{{URL::to('assets')}}/css/app.min.2.css" rel="stylesheet">
       </head>
    <body>
        <!-- Header -->
        <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                @if( !Auth::guest() )
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
                @endif

                <li class="logo hidden-xs">
                     <a href="{{URL::to('/')}}">Trav-Man</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        @if( Auth::guest() )
                            <li >
                                <a href="{{ url('/login') }}"><span class="tm-label">Login</span></a>
                            </li>
                            <li >
                                <a href="{{ url('/register') }}"><span class="tm-label">Register</span></a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="" id="notification">
                                    <i class="tm-icon zmdi zmdi-notifications-none"></i>
                                    <i class="tmn-counts" id="notification_count"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg pull-right">
                                    <div class="listview" id="notifications">
                                        <div class="lv-header">
                                            Notification

                                            <ul class="actions">
                                                <li class="dropdown">
                                                    <a href="" data-clear="notification">
                                                        <i class="zmdi zmdi-check-all"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="lv-body" id="notification_list">

                                        </div>

                                        <a class="lv-footer" href="">View Previous</a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="">
                                    <span class="tm-label text-uppercase">{{ Auth::user()->user_name }}<span class="caret"></span> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm pull-right">
                                     <div class="listview">
                                        <a class="lv-item" href="{{ url('/logout') }}" id="logout"> Logout</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </header>
<!-- End Header -->
        <!-- Side bar -->
        @if( !Auth::guest() )
        <section id="main" data-layout="layout-1">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="">
                        <div class="profile-pic">
                            <img src="{{URL::to('assets')}}/img/profile-pics/2.jpg" alt="">
                        </div>

                        <div class="profile-info">
                            @if( !Auth::guest() )
                                {{ Auth::user()->user_name }}
                            @endif

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="{{URL::to('profile')}}"><i class="zmdi zmdi-account"></i> View Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>
<!-- side bar links -->
                <ul class="main-menu">
                    <li><a href="{{ url('booking') }}"><i class="zmdi zmdi-calendar-note"></i>Booking</a></li>
                    <li><a href="{{ url('create') }}"><i class="zmdi zmdi-account-add"></i>Create Member</a></li>
                </ul>
                <!-- End side bar links -->
            </aside>

            <section id="content">

                    @yield('content')

            </section>
        </section>
        @endif
        <!-- End Side bar -->

        <input type="hidden" id="hidden" />



        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

        @yield('footer')

        <!-- Javascript Libraries -->
        <script src="{{URL::to('assets')}}/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="{{URL::to('assets')}}/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="{{URL::to('assets')}}/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="{{URL::to('assets')}}/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="{{URL::to('assets')}}/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="{{URL::to('assets')}}/js/flot-charts/curved-line-chart.js"></script>
        <script src="{{URL::to('assets')}}/js/flot-charts/line-chart.js"></script>
        <script src="{{URL::to('assets')}}/js/charts.js"></script>

        <script src="{{URL::to('assets')}}/js/charts.js"></script>
        <script src="{{URL::to('assets')}}/js/functions.js"></script>
        <script src="{{URL::to('assets')}}/js/demo.js"></script>

        <script>
            count_notifi();
            //notification_count

            setInterval(function() {count_notifi();}, 2000);

            function count_notifi(){
                var url = '{{ url("count") }}';
                $.get(url,function(data){
                    if( data == 0 )
                        $('#notification_count').hide().html(data);
                    else
                        $('#notification_count').show().html(data);
                    $('#hidden').attr('value', data);
                });
            }

            $('#notification').click(function(){
               showNotifications();
            });

            function showNotifications(){
                $('#notification_count').hide().html('0');
                var url = '{{ url("showNotifications") }}';
                var nw = $('#hidden').val();
                $.get(url, function(data){
                    var d = data;
                    //console.log(d);
                    for( i = 0; i < d.length; i++ ){
                        if( i == 0 )
                            $('#notification_list').html('<a class="lv-item" href=""><div class="media"><div class="pull-left"><img class="lv-img-sm" src="{{URL::to("assets")}}/img/profile-pics/1.jpg" alt=""></div><div class="media-body"><div class="lv-title">'+d[i].email_of_booker+'</div><small class="lv-small">'+d[i].email_of_booker+' has made a booking.</small></i></div></div></a>');
                        else
                           $('#notification_list').append('<a class="lv-item" href=""><div class="media"><div class="pull-left"><img class="lv-img-sm" src="{{URL::to("assets")}}/img/profile-pics/1.jpg" alt=""></div><div class="media-body"><div class="lv-title">'+d[i].email_of_booker+'</div><small class="lv-small">'+d[i].email_of_booker+' has made a booking.</small></div></div></a>');

                    }
                });
            }

        </script>

        @yield('footer')
    </body>
  </html>
