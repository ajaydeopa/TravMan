@extends('layouts.app2',['fullname'=> $name])
        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main2.css" />
         @section('content')
         <section id="one" class="wrapper style1">
        <div class="inner">
           @foreach($packages as $i)
            <article class="feature left">
                <span class="image"><img src="{{URL::to('assets')}}/micro/images/pic01.jpg" alt="" /></span>
                <div class="content">
                    <h2>Package 1</h2>

                    <p>Description</p>

                    <ul class="actions">

                        <li>

                            <a href='{{URL::to("packagedetails")}}/{{ $i->id }}' class="button alt">other details of package</a>

                        </li>

                    </ul>

                </div>

            </article>

            <article class="feature right">

                <span class="image"><img src="{{URL::to('assets')}}/micro/images/pic02.jpg" alt="" /></span>

                <div class="content">

                    <h2>Package 2</h2>

                    <p>Description</p>

                    <ul class="actions">

                        <li>

                            <a href='{{URL::to("packagedetails")}}/{{ $i->id }}' class="button alt">other details of package </a>

                        </li>

                    </ul>

                </div>

            </article>
		 @endforeach
        </div>

    </section>


        @endsection

           @section('footer')

            @endsection
