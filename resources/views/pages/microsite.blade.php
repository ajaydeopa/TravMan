@extends('layouts.app2',['fullname'=> $name])
        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main.css" />
         @section('content')


          <!-- Banner -->

        @section('contents')
        <i class="icon fa-diamond"></i>
        <h2>{{ $user->company_name }}</h2>
        <p>Welcome to ! </p>
         @endsection

{{-- */ $flag = 0; /*  --}}

@if(!$packages)
 <section id="one" class="wrapper style1">
            <header class="major narrow">
                <h2 style="text-align: center">No Package</h2>

                </header>

{{-- */ $flag = 1; /*  --}}

                        @else     <!-- One -->
{{-- */ $count = 1; /*  --}}

@foreach($packages as $i)
@if($count==1)

        <div class="inner">
            <article class="feature left">
                <span class="image"><img src="$i->thumb" alt="" /></span>
                <div class="content">
                    <h2>{{$i->pack_name}}</h2>
                    <h3>{{$i->pack_duration}}</h3>
                    <p>{{$i->pack_desc}}</p>
                    <ul class="actions">
                        <li>
                            <a href='{{URL::to("packagedetails")}}/{{ $i->id }}' class="button alt">other details of package</a>
                        </li>
                    </ul>
                </div>
            </article>
            {{-- */ $count = 0; /*  --}}


    @elseif($count==0)
            <article class="feature right">
                <span class="image"><img src="$i->thumb" alt="" /></span>
                <div class="content">
                        <h2>{{$i->pack_name}}</h2>
                    <h3>{{$i->pack_duration}}</h3>
                    <p>{{$i->pack_desc}}</p>

                    <ul class="actions">
                        <li>
                            <a href='{{URL::to("packagedetails")}}/{{ $i->id }}' class="button alt">other details of package</a>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
{{-- */ $count = 1; /*  --}}
        @endif
        @endforeach
@endif
        @if($flag ==0)<center>
         <ul class="actions">
                        <li>
                            <a href='{{URL::to("morepackage")}}/$user->cid'  class="button big alt">More Packages</a>
                        </li>
                    </ul></center>@endif
    </section>

    <!-- Two -->
     <!-- galery-->
    <section id="two" class="wrapper special">
        <div class="inner" style="position:inherit";>
            <header class="major narrow">
                <h2>photos gallery</h2>
                <p>Best photos</p>
            </header>

            {{-- */ $flag = 0; /*  --}}

@if(!$galery)

{{-- */ $flag = 1; /*  --}}

                        @endif
            <div class="row"><div class="lightbox photos">


                @foreach($galery as $g)

                <div data-src="{{$g->pic}}" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{$g->thumb}}" alt="" />
                    </div>
                </div>

                @endforeach




            </div></div>

@if($flag==0)
    <div class="row">
            <ul class="actions">
                <li style="margin-top:1.5em;"><a href="{{ url('galery')}}/{{$user->cid}}" class="button big alt">move to gallery</a></li>
            </ul>
</div>
        @endif    </div>

    </section>


                <!-- end Galery>
    <! Three -->
    <section id="three" class="wrapper style3 special">
        <div class="inner">
            <header class="major narrow	">
                <h2>personal details of company</h2>
                <p>Address {{$user->martial_status}} <br>Contact {{$user->phone}} </p>
            </header>
            <ul class="actions">
                <li><a href="#" class="button big alt">some other details</a></li>
            </ul>
        </div>
    </section>

    <!-- Four -->
    <section id="four" class="wrapper style2 special">
        <div class="inner">
            <header class="major narrow">
                <h2>Get in touch</h2>
                <p>feed back form</p>
            </header>
              <form method="POST" id="feed_form" onsubmit="return false;">
                  <div class="container 75%">
                  <div><strong id="message"></strong></div>
                     <div class="row uniform 50%">
                        <div class="6u 12u$(xsmall)">
                      <input type="text" name="name" placeholder="Name">
                       <div><strong id="error_names"></strong></div>
                         </div>
                         <div class="6u$ 12u$(xsmall)">
                      <input type="text" name="email" placeholder="Email">
                        <div><strong id="error_emails"></strong></div>
                         </div>
                         <div class="12u$">
                      <input type="text" name="message" placeholder="Message"></div>
               <div><strong id="error_messages"></strong></div>
                      </div>
                  </div>


                   <ul class="actions">
                    <li>
                        <input type="submit"  id="submit" onclick="f();" class="special" value="Submit" />
                    </li>
                    <li>
                        <input type="reset" class="alt" value="Reset" />
                    </li>
                </ul>


            </form>
        </div>
    </section>

    @endsection
			 @section('footer')

<script type="text/javascript">
    function f(){

        $('#submit').val('Submiting').focus();
        validateSubmit();
    }

	function validateSubmit() {
        var url = '{{ url("validateSubmit") }}';
        var data = $('#feed_form').serializeArray();
        $.get(url, data, function(data) {
            var d = data;
            if (d['names'] != 'no') {
                $('#error_names').html('');

                $('#error_names').html(d['names']);
                $('#submit').val('Submit');
            }

            else if (d['emails'] != 'no') {
                $('#error_emails').html('');
                $('#error_emails').html(d['emails']);
                $('#submit').val('Submit');
            }

            else if (d['messages'] != 'no') {
                $('#error_messages').html('');
                $('#error_messages').html(d['messages']);
                $('#submit').val('Submit');
            }
     else {
                store();
            }
        });
    }

    	function store(){
		var data = $('#feed_form').serializeArray();


            var url = '{{ url("savefeed") }}';

		$.get(url, data, function(data){
			$('#message').fadeIn().html('feed has been successfully recorded !!').fadeOut(2000);
			$(':input').val('');
			$('#submit').val('Submit');
		});
	}
</script>
@endsection
