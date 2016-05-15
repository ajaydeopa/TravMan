@extends('layouts.app2',['fullname'=> $name])

        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main2.css" />
         @section('content')

    <section id="two" class="wrapper special">
        <div class="inner" style="position:inherit";>
            <header class="major narrow">
                <h2>Full Gallery</h2>
                <p>All photos</p>
            </header>


        <div class="row"> <div class="lightbox photos">

@foreach($galery as $g)

                <div data-src="{{URL::to('')}}{{$g->pic}}" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('')}}{{$g->thumb}}" />
                    </div>
                </div>
@endforeach
        </div>
            </div>
             <div class="row">
            <ul class="action">
            </ul>
        </div>
        </div>
    </section>




        @endsection
			 @section('footer')
			@endsection
