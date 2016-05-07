@extends('layouts.app',['link' => 'Add URL'])
 @section('content')
<div class="container">
        <div class="mini-charts">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-cyan">
                    <div class="clearfix">
                        <div class="chart stats-bar"></div>
                        <div class="count">
                            <small>Total Bookings </small>
                            <h2>4</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-lightgreen">
                    <div class="clearfix">
                        <div class="chart stats-bar-2"></div>
                        <div class="count">
                            <small>Package</small>
                            <h2>7</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-orange">
                    <div class="clearfix">
                        <div class="chart stats-line"></div>
                        <div class="count">
                            <small>Facebook</small>
                            <h2>458</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-bluegray">
                    <div class="clearfix">
                        <div class="chart stats-line-2"></div>
                        <div class="count">
                            <small>Support</small>
                            <h2>236</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Todo Lists -->
        <div class="col-sm-6 col-md-4">
            <div id="todo-lists">
                <div class="tl-header">
                    <h2>Todo Lists</h2>
                    <small>Add, edit and manage your Todo Lists</small>

                </div>

                <div class="clearfix"></div>

                <div class="tl-body">
                    <div id="add-tl-item" data-trigger="hover" data-toggle="popover" data-placement="top"  title="" data-original-title="Add todo">
                        <i class="add-new-item zmdi zmdi-plus"></i>

                        <form method="POST" id="todo_form">
                            {!! csrf_field() !!}
                            <div class="add-tl-body">
                                <textarea placeholder="What you want to do..." name="new_todo" id="new-todo"></textarea>

                                <div class="add-tl-actions">
                                    <a href="" data-tl-action="dismiss" id="cancel"><i class="zmdi zmdi-close"></i></a>
                                    <a href="" data-tl-action="save" id="save"><i class="zmdi zmdi-check"></i></a>
                                    <a href="" data-tl-action="save" id="editt" style="display: none"><i class="zmdi zmdi-check"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="todo_list">

                    @if( count($todo) != 0 )
                        @foreach( $todo as $t )
                            <div class="checkbox media">
                                <div class="pull-right ">
                                    <ul class="actions actions-alt" data-trigger="hover" data-toggle="popover" data-placement="right"  title="" data-original-title="edit/delete">
                                        <li class="dropdown " id="dropdown{{ $t->id }}" >
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                                  <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a style="cursor:pointer" id="edit" todo-id="{{ $t->id }}" class="c-green f-20 p-t-0 p-b-2">Edit</a></li>
                                                <li><a style="cursor:pointer" id="delete" todo-id="{{ $t->id }}" class="c-red f-20 p-t-0 p-b-2 ">Delete</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="media-body">
                                    <label>
                                        <input type="checkbox">
                                        <i class="input-helper"></i>
                                        <span id="todo-data{{ $t->id }}">{{ $t->todo }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @endif

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
                        <form class="addEvent" role="form" onsubmit="return false;">
                            <div class="modal-body">
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
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-link" id="addEvent">Add Event</button>
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- End Calendar -->
        </div>
    </div>
</div>

@endsection

@section('footer')

<script>
    $(document).ready(function() {

        $('#todo_list').on('click', '#delete', function(){
            var id = $(this).attr('todo-id');
            $('#dropdown').removeClass('open');

            deletetodo(id);
        });

        function deletetodo(id){
            var url = '{{ url("deletetodo") }}';

            $.get(url, {'id' : id}, function(data){
                var d = data;
                var content = '';

                for( i = 0; i < d.length; i++ ){
                    content += '<div class="checkbox media"><div class="pull-right"><ul class="actions actions-alt"><li class="dropdown" id="dropdown'+ d[i]['id'] +'"><a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a><ul class="dropdown-menu dropdown-menu-right">  <li><a style="cursor:pointer" id="edit" todo-id="'+ d[i]['id'] +'"class="c-green f-20 p-t-0 p-b-2">Edit</a></li> <li><a style="cursor:pointer" id="delete" todo-id="'+ d[i]['id'] +'" class="c-red f-20 p-t-0 p-b-2 ">Delete</a></li>  </ul></li></ul></div><div class="media-body"><label><input type="checkbox"><i class="input-helper"></i><span id="todo-data'+ d[i]['id'] +'">'+ d[i]['todo'] +'</span></label></div></div>';
                }

                $('#todo_list').html(content);
            });
        }

        $('#save').click(function(){
            addtodo();
        });

        function addtodo(){
            var todo = $('#todo_form').serializeArray();
            var url = '{{ url("addtodo") }}';

            $.post(url, todo, function(data){
                var d = data;
                var content = '';

                for( i = 0; i < d.length; i++ ){
                    content += '<div class="checkbox media"><div class="pull-right"><ul class="actions actions-alt"><li class="dropdown" id="dropdown'+ d[i]['id'] +'"><a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a><ul class="dropdown-menu dropdown-menu-right">  <li><a style="cursor:pointer" id="edit" todo-id="'+ d[i]['id'] +'" class="c-green f-20 p-t-0 p-b-2">Edit</a></li> <li><a style="cursor:pointer" id="delete" todo-id="'+ d[i]['id'] +'" class="c-red f-20 p-t-0 p-b-2 ">Delete</a></li> </ul></li></ul></div><div class="media-body"><label><input type="checkbox"><i class="input-helper"></i><span id="todo-data'+ d[i]['id'] +'">'+ d[i]['todo'] +'</span></label></div></div>';
                }

                $('#todo_list').html(content);
            });
        }

        var id;

        $('#todo_list').on('click', '#edit', function(){
            id = $(this).attr('todo-id');
            $('#add-tl-item').addClass('toggled');
            $('#dropdown'+id).removeClass('open');
            $('#new-todo').val($('#todo-data'+id).text());

            $('#save').css('display', 'none');
            $('#editt').css('display', 'inline-block');
        });

        $('#editt').click(function(){
            $('#editt').css('display', 'none');
            $('#save').css('display', 'inline-block');

            var data = $('#new-todo').val();

            editTodo(data);
        });

        $('#calendar').on('click', '.fc-title', function(){

             swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                });

        });

        $('#cancel').click(function(){
            $('#editt').css('display', 'none');
            $('#save').css('display', 'inline-block');
        });

        function editTodo(data){
            var url = '{{ url("edittodo") }}';

            $.get(url, {'id' : id, 'data' : data}, function(){
                $('#todo-data'+id).html(data);
            });
        }


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
            events: [

                @if( count($events) != 0 )
                    @foreach( $events as $e )
                        {
                            title: '{{ $e->event_name }}',
                            start: new Date( {{$e->year}}, {{$e->month}}, {{$e->day}} ),
                            allDay: true,
                            className: '{{ $e->color }}'
                        },
                    @endforeach
                @endif

            ],

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
            var start = $('#getStart').val();
            var end = $('#getEnd').val();


            if (eventName != '') {
                //store event in db
                eventSave(eventName, tagColor, start);

                //Render Event
                $('#calendar').fullCalendar('renderEvent', {
                    title: eventName,
                    start: start,
                    end: end,
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


    function eventSave(eventName, tagColor, start){
        var url = '{{ url("eventsave") }}';

        $.get(url, {'event' : eventName, 'color' : tagColor, 'strt' : start});
    }

</script>
@endsection
