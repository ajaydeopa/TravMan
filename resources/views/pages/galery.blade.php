@extends('layouts.app2')
        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main2.css" />
         @section('content')

    <section id="two" class="wrapper special">
        <div class="inner">
            <header class="major narrow">
                <h2>Full Gallery</h2>
                <p>All photos</p>
            </header>


        <div class="lightbox photos">

@foreach($galery as $g)            <div class="lightbox photos">


                <div data-src="{{$g->pic}}" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{$g->thumb}}" alt="" />
                    </div>
                </div>


            </div>
@endforeach
        </div>
        </div>
    </section>

            <ul class="actions">
                <li></li>
            </ul>


        @endsection
			 @section('footer')
			@endsection
