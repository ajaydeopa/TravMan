@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="card">
                    <div class="card-header bgm-blue">
                        <h2>Add Photos<small>To Gallery</small></h2>
                    </div>
                    <div class="card-body card-padding">
                        <div id="error" style="text-align:center">
                            <h4 id="message"></h4>
                        </div>
                        <form type="POST" onsubmit="return false;" id="photo_form">
                           <!-- package photo-->
                     <div class="form-group">
								 {{ Form::file('file',null,array('class'=>'form-control')) }}
                         {!! csrf_field() !!}
                        <label for="sample3">{{ trans('subjects.File') }}</label>
                    @if ($errors->has('file'))<span class="text-warning">{{ $errors->first('file') }}</span>@endif


                            <!-- button -->
                            <div class="input-group m-b-20 ">
                                <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Add Photos</button>

                            </div>

                    </div>
                    </form>
                    <!--{{ Form::close() }}-->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
$('#submit').click(function(){
		$('#submit').val('Adding...').focus();
		addphotos();
	});
    function addphotos(){
       var myform = document.getElementById("photo_form");
    var fd = new FormData(myform);
    $.ajax({
        url: "{{url('savephotos')}}",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',

    });
	}
</script>
@endsection
