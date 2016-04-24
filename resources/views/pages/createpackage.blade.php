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
		                    <!-- package name -->
		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-receipt"></i></span>
		                        <div class="fg-line {{ $errors->has('package_name') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" placeholder="Package name" name="package_name" value="{{ old('package_name') }}">
		                        </div>
		                        <div><strong id="error_package_name"></strong></div>
		                    </div>

		                    <!-- duration -->
		                    <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
		                        <div class="fg-line {{ $errors->has('package_duration') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" placeholder="Package Duration" name="package_duration" value="{{ old('package_duration') }}">
		                        </div>
		                        <div><strong id="error_package_duration"></strong></div>
		                    </div>

<!-- description -->
                            <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-widgets"></i></span>
                                <div class="fg-line {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <textarea class="form-control auto-size" placeholder="Description" name="description" value="{{ old('description') }}" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 41px;"></textarea>
                                </div>
                                <div><strong id="error_description"></strong></div>
                            </div>

<!-- include -->


                        <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-layers"></i></span>
                                 <div class="fg-line {{ $errors->has('package_include') ? ' has-error' : '' }}">
                                    <textarea class="form-control auto-size" placeholder="Package include" name="package_include" value="{{ old('package_include') }}" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 41px;"></textarea>
                                </div>
                                <div><strong id="error_package_include"></strong></div>
                            </div>

<!-- cost include -->


                        <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-money"></i></span>
                                <div class="fg-line {{ $errors->has('cost_include') ? ' has-error' : '' }}">
                                    <textarea class="form-control auto-size" placeholder="Cost include" name="cost_include" value="{{ old('cost_include') }}" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 41px;"></textarea>
                                </div>
                                <div><strong id="error_cost_include"></strong></div>
                            </div>


<!-- notes -->

                        <div class="input-group m-b-20 ">
		                        <span class="input-group-addon"><i class="zmdi zmdi-assignment"></i></span>
                                <div class="fg-line {{ $errors->has('notes') ? ' has-error' : '' }}">
                                    <textarea class="form-control auto-size" placeholder="Notes" name="notes" value="{{ old('notes') }}" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 41px;"></textarea>
                                </div>
                                  <div><strong id="error_notes"></strong></div>
                            </div>


<!-- button -->
		                    <div class="input-group m-b-20 ">
		                       <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Booking</button>

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
