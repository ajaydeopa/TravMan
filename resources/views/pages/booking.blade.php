@extends('layouts.app',['link' => 'Add URL'])

 <style type="text/css">
            .toggle-switch .ts-label {
                min-width: 130px;
            }
        </style>

@section('content')
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
                    <!--Customer Name-->
                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div><strong id="error_name"></strong></div>
                    </div>

                    <!--Email-->

                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                        <div><strong id="error_email"></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

     <!--phone no-->
                            <div class="input-group m-b-20 ">
                                <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                                <div class="fg-line {{ $errors->has('phone_no') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control input-mask" data-mask="000-000-0000" placeholder="Phone No" maxlength="14" name="phone_no" value="{{ old('phone_no') }}">
                                </div>
                                <div><strong id="error_phone_no"></strong></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!--package id -->
                            <!--
                            <div class="input-group m-b-20 ">
                                <span class="input-group-addon"><i class="zmdi zmdi-labels"></i></span>
                                <div class="fg-line {{ $errors->has('package_id') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" placeholder="Package Id" name="package_id" value="{{ old('package_id') }}">
                                </div>

                            </div>
                            --><div class="m-l-30">

                             <select class="selectpicker" name="pack_id" id="package">

                                         <option value="default">select package</option>
                                        @if( count($package) > 0 )
                                            @foreach( $package as $p )
                                                <option value="{{ $p->id }}">{{ $p->pack_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            <div><strong id="error_package_id"></strong></div>
             </div>
                        </div>

                    <!--package duration -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group m-b-20 ">
                                <span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control" placeholder="Package Duration" name="pack_duration" id="pack_duration" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- departure date -->

                            <div class="input-group form-group m-b-20 ">
                                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container fg-line {{ $errors->has('departure_date') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control date-picker" placeholder="Departure Date" name="departure_date" value="{{ old('departure_date') }}">
                                </div>
                                <div><strong id="error_departure_date"></strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!--No of Adults-->
                            <div class="input-group m-b-20 ">
                                <span class="input-group-addon"><i class="zmdi zmdi-male-female"></i></span>
                                <div class="fg-line {{ $errors->has('no_of_adults') ? ' has-error' : '' }}">
                                <input type="text" class="form-control input-mask" placeholder="No of Adults" data-mask="000"  maxlength="3" name="no_of_adults" value="{{ old('no_of_adults') }}">
                                </div>
                                <div><strong id="error_no_of_adults"></strong></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!--No of Childrens-->
                            <div class="input-group m-b-20 ">
                                <span class="input-group-addon"><i class="zmdi zmdi-face"></i></span>
                                <div class="fg-line {{ $errors->has('no_of_childrens') ? ' has-error' : '' }}">
                                    <input type="text"class="form-control input-mask" placeholder="No of Childrens" data-mask="000"  maxlength="3" name="no_of_childrens" value="{{ old('no_of_childrens') }}">
                                </div>
                                <div><strong id="error_no_of_childrens"></strong></div>
                            </div>
                        </div>
                    </div>
                    <!--payment id-->
                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-money"></i></span>
                        <div class="fg-line {{ $errors->has('payment_id') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="Payment Id" name="payment_id" value="{{ old('payment_id') }}">
                        </div>
                        <div><strong id="error_payment_id"></strong></div>
                    </div>

                    <!--button-->
                    <div class="input-group m-b-20">
                        <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit">Booking</button>
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

                    @if( count($package) == 0 )
                        <h4 style="text-align: center;">No package is available</h4>
                    @else
                        @foreach( $package as $p )
                            <div class="panel panel-collapse">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-{{ $p->id }}" aria-expanded="true">
                                            <div class="text-capitalize">  {{ $p->pack_name }}<small class="p-l-10">({{ $p->pack_duration }})</small></div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="accordionRed-{{ $p->id }}" class="collapse out" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="f-15 c-teal"> package description</div><br>
                                         {{ $p->pack_desc }}
                                        <hr>
                                        <div class="f-15 c-teal">package include</div><br>
                                        {{ $p->pack_include }}
                                        <hr>
                                         <div class="f-15 c-teal">package Cost</div><br>
                                        {{ $p->cost_include }}

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection @section('footer')
<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            $('#submit').val('Making Booking...').focus();
            checkBooking();
        });

        $('#package').change(function(){
            var id = $(this).val();

            if( id != 'default' )
                setDuration(id);
            else
                $('#pack_duration').attr('placeholder', 'Package Duration');
        });
    });

    function setDuration(id)
    {   var url = '{{ url("getduration") }}';
        $.get(url, {'id' : id}, function(data){
            $(':input[name="pack_duration"]').attr('placeholder', data);
        });
    }

    function checkBooking() {
        var url = '{{ url("checkbooking") }}';
        var data = $('#booking_form').serializeArray();
        $.post(url, data, function(data) {
            var d = data;
            if (d['name'] != 'no') {
                $('#error_name').html(d['name']);
                $('#submit').val('Booking');
            }

            else if (d['email'] != 'no') {
                $('#error_name').html('');
                $('#error_email').html(d['email']);
                $('#submit').val('Booking');
            }

            else if (d['phone_no'] != 'no') {
                $('#error_email').html('');
                $('#error_phone_no').html("The phone no must be at least 10 characters");
                $('#submit').val('Booking');
            }

            else if (d['package_id'] != 'no') {
                $('#error_phone_no').html('');
                $('#error_package_id').html(d['package_id']);
                $('#submit').val('Booking');
            }

            else if (d['departure_date'] != 'no') {
                $('#error_package_id').html('');
                $('#error_departure_date').html(d['departure_date']);
                $('#submit').val('Booking');
            }

            else if (d['no_of_adults'] != 'no') {
                $('#error_departure_date').html('');
                $('#error_no_of_adults').html(d['no_of_adults']);
                $('#submit').val('Booking');
            }

            else if (d['no_of_childrens'] != 'no') {
                $('#error_no_of_adults').html('');
                $('#error_no_of_childrens').html(d['no_of_childrens']);
                $('#submit').val('Booking');
            }

            else if (d['payment_id'] != 'no') {
                $('#error_no_of_childrens').html('');
                $('#error_payment_id').html(d['payment_id']);
                $('#submit').val('Booking');
            }

            else {
                $('#error_payment_id').html('');
                makeBooking();
            }
        });
    }

    function makeBooking() {
        var url = '{{ url("make_booking") }}';
        var data = $('#booking_form').serializeArray();

        $.post(url, data, function() {
            $('#message').fadeIn().html('Congratulations, your booking has being made !!').fadeOut(2000);
            $(':input[type="text"]').val('');
            $('#package').val('default');
            $('#pack_duration').attr('placeholder', 'Package Duration');
            $('#submit').val('Make Booking');
        });
    }
</script>
@endsection
