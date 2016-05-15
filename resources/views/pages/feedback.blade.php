@extends('layouts.app') @section('content')
<div class="container">
	<div class="card">
		<div class="listview lv-bordered lv-lg">
			<div class="lv-header-alt clearfix">
				<h2 class="lvh-label hidden-xs">Previous feedbacks</h2>
			</div>

			<div class="lv-body" id="feed-body">
				@if( count($data) == 0)
					<div class="lv-item media">
						<div class="media-body">
							<div class="lv-title">No feedbacks</div>
						</div>
	                </div>
				@else
					@foreach( $data as $d )
						<div class="lv-item media">
							<div class="media-body">
								<div class="lv-title">{{ $d->email }}</div><br>
								<small class="lv-small">{{ $d->feedback }}</small>
								<small class="lv-small" style="text-align: right;">{{ Carbon\Carbon::parse($d->at)->diffForHumans() }}</small>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>

	<div class="card">
		<div class="listview lv-bordered lv-lg">
			<div class="lv-header-alt clearfix">
				<h2 class="lvh-label hidden-xs">Give your feedback :</h2>
			</div>

			<div class="lv-body">
				<div class="lv-item media">
					<div class="media-body">
						<form method="POST" id="feedback-form" onsubmit="return false;">
							{!! csrf_field() !!}
		            		<!--Email-->
		            		<div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
		                        <div class="fg-line {{ $errors->has('email') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
		                        </div>
		                        <div><strong id="error_email"></strong></div>
		                    </div>

		                    <!-- feedback -->

		                    <div class="input-group m-b-20 ">
			                    <span class="input-group-addon"><i class="zmdi zmdi-widgets"></i></span>
	                            <div class="fg-line {{ $errors->has('feedback') ? ' has-error' : '' }}">
	                                 <textarea class="form-control auto-size" placeholder="Feedback" name="feedback" value="{{ old('feedback') }}" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 41px;"></textarea>
	                            </div>
	                            <div><strong id="error_feedback"></strong></div>
	                        </div>

	                        <div class="input-group m-b-20">
		                        <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Submit</button>
		                    </div>
		            	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('footer')
<script>
	$('#submit').click(function(){
		$(this).val('Submitting...').focus();
		$(this).attr('disabled', 'disabled');

		validate();
	});

	function validate(){
		var url = '{{ url("validatefeedback") }}';
        var form_data = $('#feedback-form').serializeArray();

        $.post(url, form_data, function(data){
        	var d = data;

        	if( d['email'] != 'no' )
        	{	$('#error_email').html(d['email']);
        		$('#submit').html('Submit');
				$('#submit').removeAttr('disabled');
        	}
        	else if ( d['feedback'] != 'no' )
        	{	$('#error_email').html('');
        		$('#error_feedback').html(d['feedback']);
        		$('#submit').html('Submit');
				$('#submit').removeAttr('disabled');
        	}
        	else
        	{	$('#error_feedback').html('');
        		savefeedback(form_data);
        	}
        });
	}

	function savefeedback(form_data){
		var url = '{{ url("savefeedback") }}';

        $.post(url, form_data, function(data){
        	var datetime = '{{ Carbon\Carbon::now()->diffForHumans() }}';

        	//show new feedback
        	if( data == 1 )
        		$('#feed-body').html('<div class="lv-item media"><div class="media-body"><div class="lv-title">'+ form_data[1].value +'</div><br><small class="lv-small">'+ form_data[2].value +'</small><small class="lv-small" style="text-align: right;">'+ datetime +'</small></div></div>');
        	else
        		$('#feed-body').append('<div class="lv-item media"><div class="media-body"><div class="lv-title">'+ form_data[1].value +'</div><br><small class="lv-small">'+ form_data[2].value +'</small><small class="lv-small" style="text-align: right;">'+ datetime +'</small></div></div>');

        	$(':input').val('');
        	$('#submit').html('Submit');
			$('#submit').removeAttr('disabled');
        });
	}
</script>
@endsection
