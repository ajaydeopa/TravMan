@extends('layouts.app',['link' => 'Add URL'])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bgm-blue">
            <h2>Booking<small>Fill Details</small></h2>
        </div>
        <div class="card-body card-padding">
            <div id="error" style="text-align:center">
                <h4 id="message"></h4>
            </div>

            <form method="POST" id="booking_form" onsubmit="return false;">
                {!! csrf_field() !!}
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-money"></i></span>
                    <div class="fg-line {{ $errors->has('payment_id') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Payment Id" name="payment_id" value="{{ old('payment_id') }}">
                    </div>
                </div>
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
                    <div class="fg-line {{ $errors->has('package_id') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Package Id" name="package_id" value="{{ old('package_id') }}">
                    </div>
                </div>
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-smartphone-iphone"></i></span>
                    <div class="fg-line {{ $errors->has('phone_no') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Phone No" name="phone_no" value="{{ old('phone_no') }}">
                    </div>
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




@endsection @section('footer')
<script src="{{URL::to('assets')}}/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            $('#submit').val('Making Booking...').focus();
            checkBooking();
        });
    });

    function checkBooking() {
        var url = '{{ url("checkbooking") }}';
        var data = $('#booking_form').serializeArray();
        $.post(url, data, function(data) {
            if (data == 'false') {
                $('#message').fadeIn().html('All the field should not be empty & valid.').fadeOut(2000);
                $('#submit').val('Make Booking');
            } else
                makeBooking();
        });
    }

    function makeBooking() {
        var url = '{{ url("make_booking") }}';
        var data = $('#booking_form').serializeArray();

        $.post(url, data, function() {
            $('#message').fadeIn().html('Congratulations, your booking has being made !!').fadeOut(2000);
            $(':input[type="text"]').val('');
            $('#submit').val('Make Booking');
        });
    }
</script>
@endsection
