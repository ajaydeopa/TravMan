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
                           {!! csrf_field() !!}
                           <!-- package photo-->
             <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                <div>
                                    <span class="btn btn-success btn-file">
                                        <span class="fileinput-new m-b-20 ">Select image</span>
                                        <span class="fileinput-exists m-b-20">Change</span>
                                        <input type="file" name="file">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists m-b-20 m-t-20" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <!-- button -->
                            <div class="input-group m-b-20 m-t-30 ">
                                <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Add Photos</button>



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
        $('#message').fadeIn().text('photo has being successfully added !!').fadeOut(3000);
	}
</script>
@endsection
