@extends('layouts.app')
<style>
    .popover-demo .popover {
        position: relative;
        display: inline-block;
        opacity: 1;
        margin: 20px 5px 10px;
        z-index: 0;
    }
</style>


@section('content')

<div class="popover-demo">

    <span class="pull-right">   <div class="popover bottom" id="show" >
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">Notification</h3>
                                    <div class="popover-content">
                                        <p>All notification comes here </p><div onclick="show1()"><a>Next</a></div>
                                    </div>
                                </div></span>

    <span class="pull-left" style="padding-left:300px;">   <div class="popover right" id="show1">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">Sidebar</h3>
                                    <div class="popover-content">
                                        <p>by clicking = up above u can open side bar and manage all the things</p><div onclick="show2()"><a>Next</a></div>
                                    </div>
                                </div></span>

    <span class="pull-left" style="padding-left:300px; padding-top:100px;"><div class="popover right" id="show2">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">All usefull links</h3>

                                    <div class="popover-content">
                                        <p></p><div onclick="show3()"><a>Next</a></div>
                                    </div>
                                   </div></span>

    <span class="pull-left">  <div class="popover left" id="show3">
        <div class="arrow"></div>
        <h3 class="popover-title">Popover left</h3>
        <div class="popover-content">
            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p><div onclick="show4()"><a>Next</a></div>
        </div>
        </div></span>

    <span class="pull-right">  <div class="popover left" id="show5">
        <div class="arrow"></div>
        <h3 class="popover-title">Welcomes u</h3>
        <div class="popover-content">
            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
        </div>
        </div></span>

    <div class="clearfix"></div>

</div>


@endsection @section('footer')
<script type="text/javascript">

      $("#show").show();
        $("#show1").hide();
        $("#show2").hide();
        $("#show3").hide();
        $("#show5").hide();

        function show1() {
     $("#show").hide();
        $("#show1").show();

        }
     function show2() {
        $("#show1").hide();
        $("#show2").show();

        }
     function show3() {
        $("#show2").hide();
        $("#show3").show();
        }
     function show4() {
          $("#show5").show();
        $("#show").hide();
        $("#show1").hide();
        $("#show2").hide();
        $("#show3").hide();
        }


</script>
@endsection
