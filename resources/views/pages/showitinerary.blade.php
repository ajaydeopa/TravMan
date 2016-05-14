@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            	{{-- */ $day = 1; /*  --}}
            	@foreach( $day_event as $events )
	                <div class="card pt-inner">
	                    <div class="pti-header bgm-green">
	                    	@if( $day == 1 )
	                    		<h2><I>Itinerary</I></h2>
	                    	@endif
	                        <div class="ptih-title">Day {{ $day }}</div>
	                    </div>

	                	<div class="pti-body" style="text-align: left">
		                	@foreach( $events as $event )
		                        <div class="ptib-item">
		                        	<h2>{{ $event->title }} <small>{{ $event->time }}</small></h2>
		                        	<h4>{{ $event->notes }}</h4>
		                        </div>
		                	@endforeach
		                </div>
		            </div>
		            {{-- */ $day++; /*  --}}
	            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
