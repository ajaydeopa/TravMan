@extends('layouts.app',['link' => 'Add URL']) @section('content')
<div class="container">
    <!--<div class="card">
                        <div class="card-header">
                            <h2>Sales Statistics <small>Vestibulum purus quam scelerisque, mollis nonummy metus</small></h2>

                            <ul class="actions">
                                <li>
                                    <a href="">
                                        <i class="zmdi zmdi-refresh-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="zmdi zmdi-download"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="">Change Date Range</a>
                                        </li>
                                        <li>
                                            <a href="">Change Graph Type</a>
                                        </li>
                                        <li>
                                            <a href="">Other Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="chart-edge">
                                <div id="curved-line-chart" class="flot-chart "></div>
                            </div>
                        </div>
                    </div>-->

    <div class="mini-charts">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-cyan">
                    <div class="clearfix">
                        <div class="chart stats-bar"></div>
                        <div class="count">
                            <small>Website Traffics</small>
                            <h2>987,459</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-lightgreen">
                    <div class="clearfix">
                        <div class="chart stats-bar-2"></div>
                        <div class="count">
                            <small>Website Impressions</small>
                            <h2>356,785K</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-orange">
                    <div class="clearfix">
                        <div class="chart stats-line"></div>
                        <div class="count">
                            <small>Total Sales</small>
                            <h2>$ 458,778</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-bluegray">
                    <div class="clearfix">
                        <div class="chart stats-line-2"></div>
                        <div class="count">
                            <small>Support Tickets</small>
                            <h2>23,856</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--<div class="dash-widgets">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div id="site-visits" class="dash-widget-item bgm-teal">
                                    <div class="dash-widget-header">
                                        <div class="p-20">
                                            <div class="dash-widget-visits"></div>
                                        </div>

                                        <div class="dash-widget-title">For the past 30 days</div>

                                        <ul class="actions actions-alt">
                                            <li class="dropdown">
                                                <a href="" data-toggle="dropdown">
                                                    <i class="zmdi zmdi-more-vert"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a href="">Refresh</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Manage Widgets</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Widgets Settings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="p-20">

                                        <small>Page Views</small>
                                        <h3 class="m-0 f-400">47,896,536</h3>

                                        <br/>

                                        <small>Site Visitors</small>
                                        <h3 class="m-0 f-400">24,456,799</h3>

                                        <br/>

                                        <small>Total Clicks</small>
                                        <h3 class="m-0 f-400">13,965</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div id="pie-charts" class="dash-widget-item">
                                    <div class="bgm-pink">
                                        <div class="dash-widget-header">
                                            <div class="dash-widget-title">Email Statistics</div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="text-center p-20 m-t-25">
                                            <div class="easy-pie main-pie" data-percent="75">
                                                <div class="percent">45</div>
                                                <div class="pie-title">Total Emails Sent</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-t-20 p-b-20 text-center">
                                        <div class="easy-pie sub-pie-1" data-percent="56">
                                            <div class="percent">56</div>
                                            <div class="pie-title">Bounce Rate</div>
                                        </div>
                                        <div class="easy-pie sub-pie-2" data-percent="84">
                                            <div class="percent">84</div>
                                            <div class="pie-title">Total Opened</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="dash-widget-item bgm-lime">
                                    <div id="weather-widget"></div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div id="best-selling" class="dash-widget-item">
                                    <div class="dash-widget-header">
                                        <div class="dash-widget-title">Best Sellings</div>
                                        <img src="img/widgets/alpha.jpg" alt="">
                                        <div class="main-item">
                                            <small>Samsung Galaxy Alpha</small>
                                            <h2>$799.99</h2>
                                        </div>
                                    </div>

                                    <div class="listview p-t-5">
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/widgets/note4.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Samsung Galaxy Note 4</div>
                                                    <small class="lv-small">$850.00 - $1199.99</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/widgets/mate7.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Huawei Ascend Mate</div>
                                                    <small class="lv-small">$649.59 - $749.99</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/widgets/535.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Nokia Lumia 535</div>
                                                    <small class="lv-small">$189.99 - $250.00</small>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="lv-footer" href="">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

    <div class="row">
        <div class="col-sm-6 col-md-4">


            <!-- Todo Lists -->
            <div id="todo-lists">
                <div class="tl-header">
                    <h2>Todo Lists</h2>
                    <small>Add, edit and manage your Todo Lists</small>

                    <ul class="actions actions-alt">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Refresh</a>
                                </li>
                                <li>
                                    <a href="">Manage Widgets</a>
                                </li>
                                <li>
                                    <a href="">Widgets Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="clearfix"></div>

                <div class="tl-body">
                    <div id="add-tl-item">
                        <i class="add-new-item zmdi zmdi-plus"></i>

                        <div class="add-tl-body">
                            <textarea placeholder="What you want to do..."></textarea>

                            <div class="add-tl-actions">
                                <a href="" data-tl-action="dismiss"><i class="zmdi zmdi-close"></i></a>
                                <a href="" data-tl-action="save"><i class="zmdi zmdi-check"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="checkbox media">
                        <div class="pull-right">
                            <ul class="actions actions-alt">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">Delete</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <label>
                                <input type="checkbox">
                                <i class="input-helper"></i>
                                <span>Duis vitae nibh molestie pharetra augue vitae</span>
                            </label>
                        </div>
                    </div>

                    <div class="checkbox media">
                        <div class="pull-right">
                            <ul class="actions actions-alt">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">Delete</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <label>
                                <input type="checkbox">
                                <i class="input-helper"></i>
                                <span>In vel imperdiet leoorbi mollis leo sit amet quam fringilla varius mauris orci turpis</span>
                            </label>
                        </div>
                    </div>

                    <div class="checkbox media">
                        <div class="pull-right">
                            <ul class="actions actions-alt">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">Delete</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <label>
                                <input type="checkbox">
                                <i class="input-helper"></i>
                                <span>Suspendisse quis sollicitudin erosvel dictum nunc</span>
                            </label>
                        </div>
                    </div>

                    <div class="checkbox media">
                        <div class="pull-right">
                            <ul class="actions actions-alt">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">Delete</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <label>
                                <input type="checkbox">
                                <i class="input-helper"></i>
                                <span>Curabitur egestas finibus sapien quis faucibusras bibendum ut justo at sagittis. In hac habitasse platea dictumst</span>
                            </label>
                        </div>
                    </div>

                    <div class="checkbox media">
                        <div class="pull-right">
                            <ul class="actions actions-alt">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">Delete</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <label>
                                <input type="checkbox">
                                <i class="input-helper"></i>
                                <span>Suspendisse potenti. Cras dolor augue, tincidunt sit amet lorem id, blandit rutrum libero</span>
                            </label>
                        </div>
                    </div>

                    <div class="checkbox media">
                        <div class="pull-right">
                            <ul class="actions actions-alt">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">Delete</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <label>
                                <input type="checkbox">
                                <i class="input-helper"></i>
                                <span>Proin luctus dictum nisl id auctor. Nullam lobortis condimentum arcu sit amet gravida</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Calendar -->

        <div class="col-sm-6 col-md-8">

            <div id="calendar"></div>

            <!-- Add event -->
            <div class="modal fade" id="addNew-event" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add an Event</h4>
                        </div>
                        <div class="modal-body">
                            <form class="addEvent" role="form">
                                <div class="form-group">
                                    <label for="eventName">Event Name</label>
                                    <div class="fg-line">
                                        <input type="text" class="input-sm form-control" id="eventName" placeholder="eg: Sports day">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="eventName">Tag Color</label>
                                    <div class="event-tag">
                                        <span data-tag="bgm-teal" class="bgm-teal selected"></span>
                                        <span data-tag="bgm-red" class="bgm-red"></span>
                                        <span data-tag="bgm-pink" class="bgm-pink"></span>
                                        <span data-tag="bgm-blue" class="bgm-blue"></span>
                                        <span data-tag="bgm-lime" class="bgm-lime"></span>
                                        <span data-tag="bgm-green" class="bgm-green"></span>
                                        <span data-tag="bgm-cyan" class="bgm-cyan"></span>
                                        <span data-tag="bgm-orange" class="bgm-orange"></span>
                                        <span data-tag="bgm-purple" class="bgm-purple"></span>
                                        <span data-tag="bgm-gray" class="bgm-gray"></span>
                                        <span data-tag="bgm-black" class="bgm-black"></span>
                                    </div>
                                </div>

                                <input type="hidden" id="getStart" />
                                <input type="hidden" id="getEnd" />
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link" id="addEvent">Add Event</button>
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End Calendar -->
        </div>
    </div>
    <!-- Recent Posts -->

    <!-- <div class="card">

                                <div class="card-header ch-alt m-b-20">
                                    <h2>Recent Posts <small>Phasellus condimentum ipsum id auctor imperdie</small></h2>
                                    <ul class="actions">
                                        <li>
                                            <a href="">
                                                <i class="zmdi zmdi-refresh-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="zmdi zmdi-download"></i>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="">Change Date Range</a>
                                                </li>
                                                <li>
                                                    <a href="">Change Graph Type</a>
                                                </li>
                                                <li>
                                                    <a href="">Other Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <button class="btn bgm-cyan btn-float"><i class="zmdi zmdi-plus"></i></button>
                                </div>

                                <div class="card-body">
                                    <div class="listview">
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/profile-pics/1.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">David Belle</div>
                                                    <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/profile-pics/2.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Jonathan Morris</div>
                                                    <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/profile-pics/3.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Fredric Mitchell Jr.</div>
                                                    <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Glenn Jecobs</div>
                                                    <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Bill Phillips</div>
                                                    <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-footer" href="">View All</a>
                                    </div>
                                </div>
                            </div> -->

</div>

@endsection @section('footer')

<script>
    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var cId = $('#calendar'); //Change the name if you want. I'm also using thsi add button for more actions

        //Generate the Calendar
        cId.fullCalendar({
            header: {
                right: '',
                center: 'prev, title, next',
                left: ''
            },

            theme: true, //Do not remove this as it ruin the design
            selectable: true,
            selectHelper: true,
            editable: true,

            //Add Events
            events: [{
                title: 'Hangout with friends',
                start: new Date(y, m, 1),
                allDay: true,
                className: 'bgm-cyan'
            }, {
                title: 'Meeting with client',
                start: new Date(y, m, 10),
                allDay: true,
                className: 'bgm-orange'
            }, {
                title: 'Repeat Event',
                start: new Date(y, m, 18),
                allDay: true,
                className: 'bgm-amber'
            }, {
                title: 'Semester Exam',
                start: new Date(y, m, 20),
                allDay: true,
                className: 'bgm-green'
            }, {
                title: 'Coffee time',
                start: new Date(y, m, 21),
                allDay: true,
                className: 'bgm-orange'
            }, {
                title: 'Job Interview',
                start: new Date(y, m, 5),
                allDay: true,
                className: 'bgm-amber'
            }, {
                title: 'IT Meeting',
                start: new Date(y, m, 5),
                allDay: true,
                className: 'bgm-green'
            }, {
                title: 'Brunch at Beach',
                start: new Date(y, m, 1),
                allDay: true,
                className: 'bgm-lightblue'
            }, {
                title: 'Live TV Show',
                start: new Date(y, m, 15),
                allDay: true,
                className: 'bgm-cyan'
            }, {
                title: 'Software Conference',
                start: new Date(y, m, 25),
                allDay: true,
                className: 'bgm-lightblue'
            }, {
                title: 'Coffee time',
                start: new Date(y, m, 30),
                allDay: true,
                className: 'bgm-orange'
            }, {
                title: 'Job Interview',
                start: new Date(y, m, 30),
                allDay: true,
                className: 'bgm-green'
            }, ],

            //On Day Select
            select: function(start, end, allDay) {
                $('#addNew-event').modal('show');
                $('#addNew-event input:text').val('');
                $('#getStart').val(start);
                $('#getEnd').val(end);
            }
        });

        //Create and ddd Action button with dropdown in Calendar header.
        var actionMenu = '<ul class="actions actions-alt" id="fc-actions">' +
            '<li class="dropdown">' +
            '<a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>' +
            '<ul class="dropdown-menu dropdown-menu-right">' +
            '<li class="active">' +
            '<a data-view="month" href="">Month View</a>' +
            '</li>' +
            '<li>' +
            '<a data-view="basicWeek" href="">Week View</a>' +
            '</li>' +
            '<li>' +
            '<a data-view="agendaWeek" href="">Agenda Week View</a>' +
            '</li>' +
            '<li>' +
            '<a data-view="basicDay" href="">Day View</a>' +
            '</li>' +
            '<li>' +
            '<a data-view="agendaDay" href="">Agenda Day View</a>' +
            '</li>' +
            '</ul>' +
            '</div>' +
            '</li>';


        cId.find('.fc-toolbar').append(actionMenu);

        //Event Tag Selector
        (function() {
            $('body').on('click', '.event-tag > span', function() {
                $('.event-tag > span').removeClass('selected');
                $(this).addClass('selected');
            });
        })();

        //Add new Event
        $('body').on('click', '#addEvent', function() {
            var eventName = $('#eventName').val();
            var tagColor = $('.event-tag > span.selected').attr('data-tag');

            if (eventName != '') {
                //Render Event
                $('#calendar').fullCalendar('renderEvent', {
                    title: eventName,
                    start: $('#getStart').val(),
                    end: $('#getEnd').val(),
                    allDay: true,
                    className: tagColor

                }, true); //Stick the event

                $('#addNew-event form')[0].reset()
                $('#addNew-event').modal('hide');
            } else {
                $('#eventName').closest('.form-group').addClass('has-error');
            }
        });

        //Calendar views
        $('body').on('click', '#fc-actions [data-view]', function(e) {
            e.preventDefault();
            var dataView = $(this).attr('data-view');

            $('#fc-actions li').removeClass('active');
            $(this).parent().addClass('active');
            cId.fullCalendar('changeView', dataView);
        });
    });
</script>
@endsection
