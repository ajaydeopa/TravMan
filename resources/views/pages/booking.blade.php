@extends('layouts.app',['link' => 'Add URL']) @section('content')
<div class="container">
    <div class="col-md-8">
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

    <div class="col-md-4">

        <div class="card" style="min-height:470px;">
            <div class="card-header bgm-blue">
                <h2>Pakkage<small>Ids</small></h2>
            </div>
            <div class="card-body card-padding">

                <div class="panel-group" data-collapse-color="red" id="accordionRed" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-collapse">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-one" aria-expanded="true">
                                                        Collapse Red #1
                                                    </a>
                                                </h4>
                                </div>
                                <div id="accordionRed-one" class="collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-collapse">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-two" aria-expanded="false">
                                                        Collapse Red #2
                                                    </a>
                                                </h4>
                                </div>
                                <div id="accordionRed-two" class="collapse" role="tabpanel">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
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
