@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <table id="example" class="display" cellspacing="0" width="100%">
                <div class="card-header bgm-blue m-b-20">
                    <h2>Booking list</h2>
                </div>
                <div class="card-body" id="boking_list">
                    <div class="table-responsive">
                        @if($data->count() == 0) No searches @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class=" hidden-xs">No.</th>
                                    <th>email id</th>
                                    <th>Departure date</th>
                                    <th>Booking date</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody id="tbody">
                                @foreach($data as $i)
                                <tr>
                                    <td>1</td>
                                    <td><a href='booking/{{ rand(100, 999) }}{{ $i->id }}{{ rand(100,999) }}'>{{ $i->email }}</a></td>
                                    <td>{{ $i->departure_date }} </td>
                                    <td>{{ $i->booked_at }} </td>
                                    <td>
                                        <a class="btn btn-danger waves-effect delete-button" data-method="delete" id="{{ $i->id }}"><i class="zmdi zmdi-close"></i></a>
                                    </td>
                                </tr>
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



@endsection @section('footer')
<script type="text/javascript">
    $('#tbody').on('click', '.delete-button', function() {
        var id = $(this).attr('id');
        swal({
            title: "Are you sure?",
            text: "Booking will be deleted permanently !!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                cancelBooking(id);
                swal({
                    title: "Deleted!",
                    text: "The booking has been cancelled successfully !!",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                swal("Cancelled", "Cancellation aborted !!", "error");
            }
        });
    });

    function cancelBooking(id) {
        var url = '{{ url("cancel") }}';
        $.get(url, {
            'id': id
        }, function(data) {
            var d = data;
            if (d.length == 0)
                alert('hghg');
            else {
                var content = '';
                var count = 1;
                for (i = 0; i < d.length; i++) {
                    content += '<tr><td>' + count + '</td><td><a href="booking/{{rand(100, 999)}}' + d[i]["id"] + '{{rand(100, 999)}}">' + d[i]['email'] + '</a></td><td>' + d[i]['departure_date'] + '</td><td>' + d[i]['booked_at'] + '</td><td><a class="btn btn-danger waves-effect delete-button" data-method="delete" id="' + d[i]["id"] + '">Cancel Booking</a></td></tr>';
                    count++;
                }
                $('#tbody').html(content);
            }
        });
    }

</script>
@endsection