@extends('layouts.app',['link' => 'Add URL']) @section('content')
<div class="container">
    <div class="card" id="profile-main">
        <!--Start sidebar-->
        <div class="pm-overview c-overflow">
            <!-- Start profile pic-->
            <div class="pmo-pic">
                <div class="p-relative">
                    <a href="">
                        <img class="img-responsive" src="" alt="">
                    </a>
                    <a class="pmop-edit">
                        <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Update Profile Picture</span>
                    </a>
                </div>
            </div>
            <!-- End profile pic-->

            <!-- Start contact -->
            <div class="pmo-block pmo-contact hidden-xs">
                <h2>Contact</h2>
                <ul>
                    <li><i class="zmdi zmdi-phone"></i>{{ $data->phone }}</li>
                    <li><i class="zmdi zmdi-email"></i>{{ Auth::user()->email }}</li>

                    <li>
                        <i class="zmdi zmdi-pin"></i>
                        <address class="m-b-0 ng-binding">
                                            44-46 Morningside Road,<br>
                                            Edinburgh,<br>
                                            Scotland
                                        </address>

                    </li>
                </ul>
            </div>

            <!-- End contact -->
        </div>
        <!-- End sidebar-->
        <!--Start About-->
        <div class="pm-body clearfix" id="about">


            <ul class="tab-nav tn-justified">
                <li class="active waves-effect"><a href="profile-about.html">About</a></li>
            </ul>

            <!--summary-->
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-equalizer m-r-5"></i> Summary</h2>


                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a data-pmb-action="edit">Edit</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="pmbb-body p-l-30">
                    <div class="pmbb-view" id="org_summary">
                        {{ $data->summary }}
                    </div>

                    <div class="pmbb-edit">
                        <form method="POST" id="summ_form">
                            {!! csrf_field() !!}
                            <div class="fg-line">
                                <textarea class="form-control auto-size" rows="3" placeholder="Summary..." name="summary" id="summary" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 41px;">{{ $data->summary }}</textarea>
                            </div>
                            <div class="m-t-10">
                                <button data-pmb-action="reset" class="btn btn-primary btn-sm" id="save" num="1">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Basic Information-->
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>


                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a data-pmb-action="edit">Edit</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="pmbb-body p-l-30">
                    <div class="pmbb-view">
                        <dl class="dl-horizontal">
                            <dt>Full Name</dt>
                            <dd id="show_name">{{ $data->full_name }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Gender</dt>
                            <dd id="show_gender">{{ $data->gender }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Birthday</dt>
                            <dd id="show_birthday">{{$data->birthday}}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Martial Status</dt>
                            <dd id="show_status">{{$data->martial_status}}</dd>
                        </dl>
                    </div>

                    <div class="pmbb-edit">
                        <form method="POST" id="basic_info_form">
                            {!! csrf_field() !!}
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Full Name</dt>
                                <dd>
                                    <div class="fg-line">
                                        <input type="text" class="form-control" value="{{ $data->full_name }}" name="name">
                                    </div>

                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Gender</dt>
                                <dd>
                                    <div class="fg-line">
                                        <select class="form-control" name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Birthday</dt>
                                <dd>
                                    <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" data-toggle="dropdown" placeholder="Date" name="birthday">
                                    </div>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Martial Status</dt>
                                <dd>
                                    <div class="fg-line">
                                        <select class="form-control" name="martial_status">
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </dd>
                            </dl>

                            <div class="m-t-30">
                                <button data-pmb-action="reset" class="btn btn-primary btn-sm" id="save" num="2">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <!--Contact Information-->
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-phone m-r-5"></i> Contact Information</h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a data-pmb-action="edit">Edit</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="pmbb-body p-l-30">
                    <div class="pmbb-view">
                        <dl class="dl-horizontal">
                            <dt>Mobile Phone</dt>
                            <dd id="show_phone">{{ $data->phone }}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Email Address</dt>
                            <dd>{{ Auth::user()->email }}</dd>
                        </dl>
                    </div>

                    <div class="pmbb-edit">
                        <form method="POST" id="phone_form">
                            {!! csrf_field() !!}
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Mobile Phone</dt>
                                <dd>
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="eg. 00971 12345678 9" name="phone">
                                    </div>
                                </dd>
                            </dl>
                            <div class="m-t-30">
                                <button data-pmb-action="reset" class="btn btn-primary btn-sm" id="save" num="3">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--End About-->
</div>


@endsection @section('footer')
<script>
    $('#about').on('click', '#save', function() {
        var num = $(this).attr('num');
        if (num == 1)
            summarySave();
        else if (num == 2)
            basicInfoSave();
        else
            contactInfoSave();
    });

    //update summary
    function summarySave() {
        var url = '{{ url("summarysave") }}';
        var summ = $('#summ_form').serializeArray();

        $.post(url, summ, function() {
            $('#org_summary').html(summ[1].value);
        });
    }

    //update basic info
    function basicInfoSave() {
        var url = '{{ url("basicinfosave") }}';
        var data = $('#basic_info_form').serializeArray();

        $.post(url, data, function() {
            $('#show_name').html(data[1].value);
            $('#show_gender').html(data[2].value);
            $('#show_birthday').html(data[3].value);
            $('#show_status').html(data[4].value);
        });
    }

    //update contact info
    function contactInfoSave() {
        var url = '{{ url("contactinfosave") }}';
        var data = $('#phone_form').serializeArray();

        $.post(url, data, function() {
            $('#show_phone').html(data[1].value);
        });
    }

</script>
@endsection
