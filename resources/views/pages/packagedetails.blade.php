@extends('layouts.app2')
        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main2.css" />
         @section('content')
         <!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>{{$packages->pack_name}}</h2>

					</header>

					<a href="#" class="image fit"><img src="{{URL::to('assets')}}/micro/images/pic01.jpg" alt="" /></a>
                    <h2>Package details</h2>
				       {{$packages-> pack_duration}};
                    <br>

                        {{$packages->pack_desc}};

                    <br>
                     {{$packages->pack_include}};
                    <br>
                     {{$packages->cost_include}};
        	</div>
			</section>


        @endsection
			 @section('footer')
			@endsection
