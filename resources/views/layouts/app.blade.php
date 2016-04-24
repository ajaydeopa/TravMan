<html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

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
    <link href="{{URL::to('assets')}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="{{URL::to('assets')}}/css/app.min.1.css" rel="stylesheet">
    <link href="{{URL::to('assets')}}/css/app.min.2.css" rel="stylesheet">

</head>

<body>
    <!--Start Header-->

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
                    <li>
                        <a href="{{ url('/login') }}"><span class="tm-label">Login</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}"><span class="tm-label">Register</span></a>
                    </li>
                    @else
                    <!-- toggle-->
                   <!-- <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>-->
                    <!-- toggle-->
                    <!-- Search -->
                    <!--      <li id="top-search">
                        <a href=""><i class="tm-icon zmdi zmdi-search"></i></a>
                    </li>-->
                    <!-- End Search -->

                    <!-- Notification -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="" id="notification">
                            <i class="tm-icon zmdi zmdi-notifications-none"></i>
                            <i class="tmn-counts" id="notification_count"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview" id="notifications">

                                <div class="lv-header">
                                    Notification
                                </div>
                                <div class="lv-body" id="notification_list">

                                </div>

                                <a class="lv-footer" href="">View Previous</a>
                            </div>

                        </div>

                        <!-- End Notification -->

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


        <!-- Top Search Content -->
        <div id="top-search-wrap">
            <div class="tsw-inner">
                <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                <input type="text">
            </div>
        </div>

        <!-- End Top Search Content -->
    </header>
    <!-- End Header -->

    <!-- Start Sidebar-->
    @if( !Auth::guest() )
    <section>
        <aside id="sidebar" class="sidebar c-overflow">
            <div class="profile-menu">
                <a href="">
                    <div class="profile-pic">
                        <img src="{{URL::to('assets')}}/img/profile-pics/2.jpg" alt="">
                    </div>
                    <div class="profile-info">
                        @if( !Auth::guest() ) {{ Auth::user()->user_name }} @endif
                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                </a>

                <ul class="main-menu">
                    <li>
                        <a href="{{ url('profile')}}"><i class="zmdi zmdi-account"></i> View Profile</a>
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

<!--Start sidebar links -->
            <ul class="main-menu">
                <li><a href="{{URL::to('/')}}"><i class="zmdi zmdi-tv"></i>Dashboard</a></li>
                <li><a href="{{ url('booking')}}"><i class="zmdi zmdi-calendar-note"></i>Booking</a></li>
                <li><a href="{{ url('showbookings')}}"><i class="zmdi zmdi-view-list"></i>Show booking</a></li>
                @if( Auth::user()->flag == 1 )
                    <li><a href="{{ url('create') }}"><i class="zmdi zmdi-account-add"></i>Create Member</a></li>
                @endif
                <li><a href="{{ url('createpackage')}}"><i class="zmdi zmdi-local-mall"></i>Create package</a></li>
                <li class="sub-menu">
                    <a href=""><i class="zmdi zmdi-view-compact"></i> Headers</a>

                    <ul>
                        <li><a href="textual-menu.html">Textual menu</a></li>
                        <li><a href="image-logo.html">Image logo</a></li>
                        <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                    </ul>
                </li>
            </ul>
            <!-- End sidebar links -->
        </aside>

        @endif
        <input type="hidden" id="hidden" />


    </section>
     <!-- End Sidebar -->
      <section id="main">

            @yield('content')

        </section>
    <!-- Start Page Loader -->
    <div class="page-loader">
        <div class="preloader pls-blue">
            <svg class="pl-circular" viewBox="25 25 50 50">
                <circle class="plc-path" cx="50" cy="50" r="20" />
            </svg>

            <p>Please wait...</p>
        </div>
    </div>
    <!--End Page Loader -->

    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

   @yield('footer')
    <!-- Javascript Libraries -->
    <script src="{{URL::to('assets')}}/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="{{URL::to('assets')}}/vendors/input-mask/input-mask.min.js"></script>

     <script src="{{URL::to('assets')}}/vendors/bower_components/flot/jquery.flot.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/sparklines/jquery.sparkline.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/Waves/dist/waves.min.js"></script>

    <script src="{{URL::to('assets')}}/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/autosize/dist/autosize.min.js"></script>
     <script src="{{URL::to('assets')}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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
    @if( !Auth::guest() )
    <script>
        count_notifi();
        //notification_count

        setInterval(function() {
            count_notifi();
        }, 2000);

        function count_notifi() {
            var url = '{{ url("count") }}';
            $.get(url, function(data) {
                if (data == 0)
                    $('#notification_count').hide().html(data);
                else
                    $('#notification_count').show().html(data);
                $('#hidden').attr('value', data);
            });
        }

        $('#notification').click(function() {
            showNotifications();
        });

        function showNotifications() {
            $('#notification_count').hide().html('0');
            var url = '{{ url("showNotifications") }}';
            var nw = $('#hidden').val();
            $.get(url, function(data) {
                var d = data;
                //console.log(d);

                var content = '';
                for (i = 0; i < d.length; i++) {
                    var status = 'cancelled booking.';
                    if( d[i]['booking_status'] == 'booked' )
                        status = 'made a booking.';

                    content += '<a class="lv-item" href=""><div class="media"><div class="pull-left"><img class="lv-img-sm" src="{{URL::to("assets")}}/img/profile-pics/1.jpg" alt=""></div><div class="media-body"><div class="lv-title">' + d[i].email_of_booker + '</div><small class="lv-small">' + d[i].email_of_booker + ' '+ status +'</small></i></div></div></a>';
                }
                $('#notification_list').html(content);
            });
        }
    </script>
    @endif
@yield('footer')
</body>

</html>
