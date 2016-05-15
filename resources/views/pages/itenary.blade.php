@extends('layouts.app') @section('content')
<a href="{{ url('show+itinerary') }}/{{ rand(100, 999) }}{{ $id }}{{ rand(100, 999) }}" target="parent">Show Itinerary</a>
<div class="col-md-3">
    <div class="card">
        <div class="card-header bgm-blue">
            <h2>Add Days</h2>
        </div>
        <div class="card-body card-padding">
        	<div class="table-responsive">
                <table class="table table-hover">
					<tbody id="tbody">
						@foreach( $days as $d )
							<tr id="days" data-day="{{ $d->day_no }}" data-id="{{ $d->id }}">
								<td>{{ $d->day_no }}</td>
							</tr>
						@endforeach
                    </tbody>
                </table>
            </div>

            <input type="button" value="Add day" id="add-day"></input>
		</div>
    </div>
</div>

<div class="col-md-6">
	<div class="card" style="min-height:470px;">
        <div class="card-header bgm-blue">
            <h2 id="event-day">Day 1</h2>


           	<div class="btn-group"  style="float: right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Add event<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a data-toggle="modal" href="#preventClick" class="btn btn-default">Activity</a></li>
                </ul>
            </div>


        </div>
        <div class="card-body card-padding">

           <div class="table-responsive">
                <table class="table table-hover">
					<tbody id="event-body">
						@foreach( $events as $e )
							<tr>
								<td>
									<h4>{{ $e->title }} <small>{{ $e->time }}</small></h4>
									<h5>{{ $e->notes }}</h5>
								</td>
							</tr>
						@endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="modal fade" id="preventClick" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Event details</h4>
                    </div>
	                <div class="modal-body">

	                    <form method="POST" id="event-form">
	                    	{!! csrf_field() !!}
	                    	<input type="hidden" name="day" value="{{ $day1_id }}"></input>
		                	Title : <input type="text" name="title"></input><br/>
		                	Time : <input type="text" name="time"></input><br/>
		                	Note : <input type="text" name="note"></input>
	                    </form>
	                    <div id="error-event"></div>

	                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal" id="save-event">Save</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
	var dayno = parseInt({{ $days_count }}) + 1;
	var num = /[0-9]/;

	$('#add-day').click(function(){
		var url = '{{ url("saveday") }}';

		$.get(url, {'id': '{{ $id }}', 'day': dayno}, function(data){
			var content = '<tr id="days" data-day="Day '+ dayno +'" data-id="'+ data +'"><td>Day'+ dayno +'</td></tr>';
			$('#tbody').append(content);
			dayno = parseInt(dayno) + 1;
		});
	});

	$('#tbody').on('click', '#days', function(){
		var id = $(this).attr('data-id');
		var day = $(this).attr('data-day');

		showDaysEvents(id, day);
	});

	$('#save-event').click(function(){
		//$(this).removeAttr('data-dismiss');
		var title = $(':input[name="title"]').val();
		var note = $(':input[name="note"]').val();
		var time = $.trim($(':input[name="time"]').val());
		var ch = 1;
		var time_cnt = 0;

		for( i = 0; i < time.length; i++ ){
			if( time[i] != ' ' ){
				if( ( parseInt(time_cnt) < 2 || ( parseInt(time_cnt) > 2 && parseInt(time_cnt) < 5 ) ) ){
					if( !time[i].match(num) ){
						ch = 0;
						alert('1');
					}
				}
				else if( time_cnt == 2 ){
					if( time[i] != ':' ){
						ch = 0;
						alert('2');
					}
				}
				else if( time_cnt == 5 ){
					if( time[i] != 'a' && time[i] != 'p' ){
						ch = 0;
						alert('3');
					}
				}
				else if( time_cnt == 6 ){
					if( time[i] != 'm' ){
						ch = 0;
						alert('4');
					}
				}

				time_cnt = parseInt(time_cnt) + 1;
			}
			if( ch == 0 )
				break;
		}

		if( time_cnt != 7 )
			ch = 0;

		if( title == '' || note == '' ){
			$(this).attr('data-dismiss', '');
			$('#error-event').html('Title & note fields are necessary!!');
		}
		else if( ch == 0 ){
			$(this).attr('data-dismiss', '');
			$('#error-event').html('Invalid time entry!!');
		}
		else{
			alert('hjh');
			$(this).attr('data-dismiss', 'modal');
			$('#error-event').html('');
			saveEvent();
		}
	});

	function showDaysEvents(id, day){
		var url = '{{ url("show+events") }}';

		$.get(url, {'id': id}, function(data){
			var d = data;
			var content = '';

			for( i = 0; i < d.length; i++ ){
				content += '<tr><td><h4>'+ d[i]['title'] +' <small>'+ d[i]['time'] +'</small></h4><h5>'+ d[i]['notes'] +'</h5></td></tr>';
			}

			$('#event-body').html(content);

			$('#event-day').html(day);
			$(':input[name="day"]').val(id);
		});
	}

	function saveEvent(){
		var url = '{{ url("save+event") }}';
		var data = $('#event-form').serializeArray();

		//alert(data[2].value);
		$.post(url, data, function(){
			var content = '';

			content += '<tr><td><h4>'+ data[2].value +' <small>'+ data[3].value +'</small></h4><h5>'+ data[4].value +'</h5></td></tr>';

			$('#event-body').append(content);

			$(':input[type!="button"]').val('');
		});
	}
</script>
@endsection
