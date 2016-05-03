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
		                        <div><strong id="error_name"></strong></div>
		                    </div>


		                    <!-- duration -->
		                    <div class="row m-b-10 ">
		                    <div class="col-sm-4">
		                    <div class="input-group">
		                    	  <span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
                                    <div class="fg-line fg-toggled">
                                            <input type="text" class="form-control" value="Duration"  placeholder="Duration" disabled="">
                                        </div>
                               </div>
                                </div>
			                 <div class="col-sm-4">
	                                    <div class="input-group">
	                                        <span class="input-group-addon"><i class="zmdi zmdi-sun"></i></span>
	                                        <div class="fg-line">
                                       <input type="text" class="form-control input-mask" data-mask="00" placeholder="Number of Days" name="days" value="{{ old('days') }}" maxlength="2" autocomplete="off">
                                           </div>
	                                    </div>
	                            	</div>
	                           <div class="col-sm-4">
	                                    <div class="input-group">
	                                        <span class="input-group-addon"><i class="zmdi zmdi-time-interval"></i></span>
	                                        <div class="fg-line">
                                                 <input type="text" class="form-control input-mask" data-mask="00" placeholder="Number of Nights" name="nights" value="{{ old('nights') }}" maxlength="2" autocomplete="off">
                                            </div>
	                                    </div>
	                            	</div>
	                            	 <div><strong id="error_duration" style="padding-left: 40px"></strong></div>
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
                                <div><strong id="error_pack_include"></strong></div>
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
		                       <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Create Package</button>

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
		$('#submit').val('Creating Package...').focus();
		validatePackage();
	});

	function validatePackage() {
        var url = '{{ url("validatePackage") }}';
        var data = $('#package_form').serializeArray();
        $.post(url, data, function(data) {
            var d = data;
            if (d['name'] != 'no') {
                $('#error_name').html(d['name']);
                $('#submit').val('Create Package');
            }

            else if (d['duration'] != 'no') {
                $('#error_name').html('');
                $('#error_duration').html(d['duration']);
                $('#submit').val('Create Package');
            }

            else if (d['description'] != 'no') {
                $('#error_duration').html('');
                $('#error_description').html(d['description']);
                $('#submit').val('Create Package');
            }

            else if (d['package_include'] != 'no') {
                $('#error_description').html('');
                $('#error_pack_include').html(d['package_include']);
                $('#submit').val('Create Package');
            }

            else if (d['cost_include'] != 'no') {
                $('#error_pack_include').html('');
                $('#error_cost_include').html(d['cost_include']);
                $('#submit').val('Create Package');
            }

            else if (d['notes'] != 'no') {
                $('#error_cost_include').html('');
                $('#error_notes').html(d['notes']);
                $('#submit').val('Create Package');
            }

            else {
                $('#error_notes').html('');
                createPackage();
            }
        });
    }

	function createPackage(){
		var data = $('#package_form').serializeArray();
		var url = '{{ url("savepackage") }}';

		$.post(url, data, function(data){
			$('#message').fadeIn().html('Package has been successfully created !!').fadeOut(2000);
			$(':input').val('');
			$('#submit').val('Create Package');
		});
	}
</script>
@endsection
