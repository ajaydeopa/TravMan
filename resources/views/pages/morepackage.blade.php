@extends('layouts.app2',['fullname'=> $name])

        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main2.css" />
         @section('content')
  {{-- */ $count = 1; /*  --}}

@foreach($packages as $i)
@if($count==1)
    <section id="one" class="wrapper style1">
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


    </section>

        @endsection
			 @section('footer')
			@endsection
