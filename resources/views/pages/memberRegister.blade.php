@extends('layouts.app',['link' => 'Add URL'])
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header bgm-blue">
            <h2>Add Member<small>Please Fill Details</small></h2>
        </div>
        <div class="card-body card-padding">
            <div style="text-align:center">
                <h4 id="message"></h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" onsubmit="return false" id="member_form">
                {!! csrf_field() !!}
                <!-- User Name -->
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line {{ $errors->has('user_name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Full Name" name="user_name" value="{{ old('user_name') }}">
                    </div>
                    <div><strong id="error_name"></strong></div>
                </div>
                <!-- Email -->

                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div><strong id="error_email"></strong></div>
                </div>
                <!-- password -->


                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                    <div class="fg-line {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div><strong id="error_password"></strong></div>
                </div>

                <!-- Confirm password -->
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                    <div class="fg-line {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    </div>
                </div>

                <!-- button -->
                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"></span>
                    <div class="fg-line">
                        <button class="btn bgm-lightblue waves-effect" type="submit" name="book" id="submit"> Member</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection @section('footer')

<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            $('#submit').val('Creating Member...').focus();

            validatemember();
        });
    });

    function validatemember(){
        var url = '{{ url("validatemember") }}';
        var data = $('#member_form').serializeArray();
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

            else if (d['password'] != 'no') {
                $('#error_email').html('');
                $('#error_password').html(d['password']);
                $('#submit').val('Booking');
            }

            else {
                $('#error_password').html('');
                createMember();
            }
        });
    }

    function createMember() {
        var url = '{{ url("create_member") }}';
        var data = $('#member_form').serializeArray();
        $.post(url, data, function(data) {
            $('#message').fadeIn().text('Member has being successfully added !!').fadeOut(3000);
            $('#submit').val('Create Member');
            $(':input[type="text"], :input[type="password"]').val('');
            //alert(data);
        });
    }

</script>
@endsection
