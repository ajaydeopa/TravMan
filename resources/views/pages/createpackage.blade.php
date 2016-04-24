@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            	<div class="card">
		            <div class="card-header bgm-blue">
		                <h2>Create Package<small>Fill Details</small></h2>
		            </div>
		            <div class="card-body card-padding">
		                <div id="error" style="text-align:center">
		                    <h4 id="message"></h4>
		                </div>

		                <form method="POST" id="package_form" onsubmit="return false;">
		                    {!! csrf_field() !!}
		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
		                        <div class="fg-line {{ $errors->has('package_name') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" placeholder="Package name" name="package_name" value="{{ old('package_name') }}">
		                        </div>
		                        <div><strong id="error_package_name"></strong></div>
		                    </div>

		                    <!-- duration -->
		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
		                        <div class="fg-line {{ $errors->has('package_duration') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" placeholder="Package Duration" name="package_duration" value="{{ old('package_duration') }}">
		                        </div>
		                        <div><strong id="error_package_duration"></strong></div>
		                    </div>

							<div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
		                        <div class="fg-line {{ $errors->has('description') ? ' has-error' : '' }}">
		                            <textarea placeholder="Description" name="description" value="{{ old('description') }}"></textarea>
		                        </div>
		                        <div><strong id="error_description"></strong></div>
		                    </div>

		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
		                        <div class="fg-line {{ $errors->has('package_include') ? ' has-error' : '' }}">
		                            <textarea placeholder="Package include" name="package_include" value="{{ old('package_include') }}"></textarea>
		                        </div>
		                        <div><strong id="error_package_include"></strong></div>
		                    </div>

		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
		                        <div class="fg-line {{ $errors->has('cost_include') ? ' has-error' : '' }}">
		                            <textarea placeholder="Cost include" name="cost_include" value="{{ old('cost_include') }}"></textarea>
		                        </div>
		                        <div><strong id="error_cost_include"></strong></div>
		                    </div>

		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
		                        <div class="fg-line {{ $errors->has('notes') ? ' has-error' : '' }}">
		                            <textarea placeholder="Notes" name="notes" value="{{ old('notes') }}"></textarea>
		                        </div>
		                        <div><strong id="error_notes"></strong></div>
		                    </div>

		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"></span>
		                        <div class="fg-line">

		                            <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Booking</button>

		                        </div>
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
<script type="text/javascript">
	$('#submit').click(function(){
		createPackage();
	});

	function createPackage(){
		var data = $('#package_form').serializeArray();
		var url = '{{ url("savepackage") }}';

		$.post(url, data, function(data){
			$('#message').fadeIn().html('Package has been successfully created !!').fadeOut(2000);
		});
	}
</script>
@endsection
