@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="card">
            	<table id="example" class="display" cellspacing="0" width="100%">
	                <div class="card-header bgm-blue m-b-20">
	                    <h2>Packages list</h2>
	                </div>
	                <div class="card-body" id="boking_list">
	                    <div class="table-responsive" id="table-body">
	                        @if($data->count() == 0)
	                            <p style="text-align: center">No bookings</p>
	                        @else
	                        <table class="table table-hover">
	                            <thead id="thead">
	                                <tr>
	                                    <th class=" hidden-xs">No.</th>
	                                    <th>Package Name</th>
	                                    <th>Action</th>
	                                </tr>

	                            </thead>

	                            <tbody id="tbody">
	                                {{-- */ $count = 1; /*  --}}
	                                @foreach($data as $i)
	                                    <tr>
	                                        <td>{{ $count }}</td>
	                                        <td><a href=''>{{ $i->pack_name }}</a></td>
	                                        <td>
	                                            <a class="btn btn-danger waves-effect delete-button" data-method="delete" id="{{ $i->id }}">Delete</a>
	                                            <a class="btn btn-edit waves-effect itenary-button" data-method="edit" href="{{ url('itinerary') }}/{{ $i->id }}" id="{{ $i->id }}">Itinerary</a>
	                                        </td>
	                                    </tr>
	                                    {{-- */ $count++; /* --}}
	                                @endforeach
	                            </tbody>
	                        </table>
	                        @endif
	                    </div>
	                </div>

	            </table>
            </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
	$('#tbody').on('click', '.delete-button', function(){
		var id = $(this).attr('id');
		swal({
	            title: "Are you sure?",
	            text: "Package will be deleted permanently !!",
	            type: "warning",
	            showCancelButton: true,
	            confirmButtonColor: "#DD6B55",
	            confirmButtonText: "Yes, delete it!",
	            cancelButtonText: "No, cancel plx!",
	            closeOnConfirm: false,
	            closeOnCancel: false
	        }, function(isConfirm) {
	            if (isConfirm) {
	                deletePackage(id);
	                swal({
	                    title: "Deleted!",
	                    text: "The Package has been deleted successfully !!",
	                    type: "success",
	                    timer: 1500,
	                    showConfirmButton: false
	                });
	            } else {
	                swal("Cancelled", "Deletion stopped !!", "error");
	            }
        });
	});

	function deletePackage(id){
		var url = '{{ url("delete+package") }}';

		$.get(url, {'id': id}, function(data){
			var d = data;
			var content = '';

			if( d.length == 0 ){
				$('#thead').css('display', 'none');
				$('#table-body').html('<p style="text-align: center">No bookings</p>');
				$('#tbody').html(content);
			}

			else{
				for( i = 0; i < d.length; i++ ){
					content += '<tr><td>'+ (parseInt(i) + 1) +'</td><td><a href="">'+ d[i]['pack_name'] +'</a></td><td><a class="btn btn-danger waves-effect delete-button" data-method="delete" id="'+ d[i]['id'] +'">Delete</a><a class="btn btn-edit waves-effect itenary-button" data-method="edit" href="itinerary/'+ d[i]['id'] +'" id="'+ d[i]['id'] +'">Itinerary</a></td></tr>';
				}

				$('#tbody').html(content);
			}
		});
	}
</script>
@endsection
