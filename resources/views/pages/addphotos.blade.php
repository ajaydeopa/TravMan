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

                        <form method="POST" id="photo_form" onsubmit="return false;">
                            {!! csrf_field() !!}


                           <!-- package photo-->
                      <input type="text" name="user_name">

                            <!-- button -->
                            <div class="input-group m-b-20 ">
                                <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Add Photos</button>

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
		$('#submit').val('Adding...').focus();
		addphotos();
	});
    function addphotos(){
        var url = '{{ url("savephotos") }}';
		var data = $('#photo_form').serializeArray();
		$.post(url, data, function(data){
			$('#message').fadeIn().html('photos has been successfully created !!').fadeOut(2000);
			$('#submit').val('Add Photos');
              $(':input').val('');
            alert(data);
		});
	}
</script>
@endsection
