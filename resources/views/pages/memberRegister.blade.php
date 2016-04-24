@extends('layouts.app',['link' => 'Add URL']) @section('content')

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
                <div class="form-group fg-float">
                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line {{ $errors->has('user_name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}">
                            <label class="fg-label">Full Name</label>
                        </div>
                        <p>
                            <strong class="c-red" id="error_name"></strong>
                        </p>
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group fg-float">
                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            <label class="fg-label">E-Mail Address</label>
                        </div>
                        <p>
                            <strong class="c-red" id="error_email"></strong>
                        </p>
                    </div>
                </div>

                <!-- password -->
                <div class="form-group fg-float">
                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <div class="fg-line {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password">
                            <label class="fg-label">Password</label>
                        </div>
                        <p>
                            <strong class="c-red" id="error_password"></strong>
                        </p>
                    </div>
                </div>

                <!-- Confirm password -->
                <div class="form-group fg-float">
                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <div class="fg-line {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password_confirmation">
                            <label class="fg-label">Confirm Password</label>
                        </div>
                        <p>
                            <strong class="c-red" id="error_confirm"></strong>
                        </p>
                    </div>
                </div>

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
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        validate();

        $('#submit').click(function() {
            $('#submit').val('Creating Member...').focus();

            var name = $(':input[name="user_name"]').val();
            var email = $(':input[name="email"]').val();
            var password = $(':input[name="password"]').val();
            var confirm = $(':input[name="password_confirmation"]').val();

            if (name != '' && email != '' && password != '' && confirm != '' && $('#error_name').text() == '' && $('#error_email').text() == '' && $('#error_password').text() == '' && $('#error_confirm').text() == '')
                createMember();
            else {
                if (name == '')
                    $("#error_name").text("Field shouldn't be empty");
                if (email == '')
                    $("#error_email").text("Field shouldn't be empty");
                if (password == '')
                    $("#error_password").text("Field shouldn't be empty");
                if (confirm == '')
                    $("#error_confirm").text("Field shouldn't be empty");
                $('#submit').val('Create Member');
            }
        });
    });

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

    function validate() {
        var pattern = /[a-zA-Z ]/;
        var email_pattern = /[0-9a-zA-Z ]/;

        //validate name while writing
        $(':input[name="user_name"]').focusin(function() {
            $(this).keyup(function() {
                $("#error_name").text('');
                var value = $(this).val();
                for (var i = 0; i < value.length; i++) {
                    if (!value.charAt(i).match(pattern)) {
                        $("#error_name").text('Name should contain only alphabets.').css('font-weight', 'bold');
                        break;
                    }
                }
            });
        });

        //validate email while writing
        $(':input[name="email"]').focusin(function() {
            $(this).keyup(function() {
                var value = $(this).val();
                if (value == '')
                    $("#error_email").text('');
                else if (value.indexOf('@') <= 0 || value.indexOf('.') <= 0 || value.indexOf('@') > value.indexOf('.') || value.indexOf('.') >= (value.length - 2)) {
                    $("#error_email").text('Invalid email address.').css('font-weight', 'bold');
                } else {
                    $("#error_email").text('');
                    for (var i = 0; i < value.indexOf('@'); i++) {
                        if (!value.charAt(i).match(email_pattern)) {
                            $("#error_email").text('Invalid email address.').css('font-weight', 'bold');
                            break;
                        }
                    }
                }
            });
        });

        //validate password while writing
        $(':input[name="password"]').focusin(function() {
            $(this).keyup(function() {
                var value = $(this).val();
                if (value == '')
                    $('#error_password').text('');
                else if (value.length < 6)
                    $('#error_password').text('Password too short !!').css('font-weight', 'bold');
                else
                    $('#error_password').text('');
            });
        });

        //validate confirm password while writing
        $(':input[name="password_confirmation"]').focusin(function() {
            $(this).keyup(function() {
                var value = $(this).val();
                var temp = $(':input[name="password"]').val();
                //alert($(':input[name="password"]').val());
                if (value == '')
                    $('#error_confirm').text('');
                else if (value != temp)
                    $('#error_confirm').text("Password doesn't match !!").css('font-weight', 'bold');
                else
                    $('#error_confirm').text('');
            });
        });
    }

</script>
@endsection
