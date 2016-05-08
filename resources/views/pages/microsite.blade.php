@extends('layouts.app2',['fullname'=> $user->full_name])
        <link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main.css" />
         @section('content')


          <!-- Banner -->

        @section('contents')
        <i class="icon fa-diamond"></i>
        <h2>{{ $user->company_name }}</h2>
        <p>Welcome to ! </p>
         @endsection


     <!-- One -->
@foreach($packages as $i)


    <section id="one" class="wrapper style1">
        <div class="inner">
            <article class="feature left">
                <span class="image"><img src="{{URL::to('assets')}}/micro/images/pic01.jpg" alt="" /></span>
                <div class="content">
                    <h2>{{$i->pack_name}}</h2>
                    <p>{{$i->pack_desc}}</p>
                    <ul class="actions">
                        <li>
                            <a href="{{ url('packagedetails')}}" class="button alt">other details of package</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="feature right">
                <span class="image"><img src="{{URL::to('assets')}}/micro/images/pic02.jpg" alt="" /></span>
                <div class="content">
                        <h2>{{$i->pack_name}}</h2>
                    <p>{{$i->pack_desc}}</p>

                    <ul class="actions">
                        <li>
                            <a href="{{ url('packagedetails')}}" class="button alt">other details of package </a>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
        @endforeach
        <center>
         <ul class="actions">
                        <li>
                            <a href="{{ url('morepackage')}}" class="button big alt">More Packages</a>
                        </li>
                    </ul></center>
    </section>

    <!-- Two -->
     <!-- galery-->
    <section id="two" class="wrapper special">
        <div class="inner">
            <header class="major narrow">
                <h2>photos gallery</h2>
                <p>Best photos</p>
            </header>

            <div class="lightbox photos">

                <div data-src="{{URL::to('assets')}}/media/gallery/1.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/1.jpg" alt="" />
                    </div>
                </div>

                <div data-src="{{URL::to('assets')}}/media/gallery/2.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/2.jpg" alt="" />
                    </div>
                </div>

                <div data-src="{{URL::to('assets')}}/media/gallery/3.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/3.jpg" alt="" />
                    </div>
                </div>

                <div data-src="{{URL::to('assets')}}/media/gallery/4.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/4.jpg" alt="" />
                    </div>
                </div>

                <div data-src="{{URL::to('assets')}}/media/gallery/5.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/5.jpg" alt="" />
                    </div>
                </div>
                <div data-src="{{URL::to('assets')}}/media/gallery/6.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/6.jpg" alt="" />
                    </div>
                </div>
                <div data-src="{{URL::to('assets')}}/media/gallery/7.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/7.jpg" alt="" />
                    </div>
                </div>
                <div data-src="{{URL::to('assets')}}/media/gallery/8.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/8.jpg" alt="" />
                    </div>
                </div>
                <div data-src="{{URL::to('assets')}}/media/gallery/9.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/9.jpg" alt="" />
                    </div>
                </div>
             <div data-src="{{URL::to('assets')}}/media/gallery/1.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/1.jpg" alt="" />
                    </div>
                </div>

                <div data-src="{{URL::to('assets')}}/media/gallery/2.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/2.jpg" alt="" />
                    </div>
                </div>

                <div data-src="{{URL::to('assets')}}/media/gallery/3.jpg" class="col-md-2 col-sm-4 col-xs-6">
                    <div class="lightbox-item p-item">
                        <img src="{{URL::to('assets')}}/media/gallery/thumbs/3.jpg" alt="" />
                    </div>
                </div>


            </div>

            <ul class="actions">
                <li style="margin-top:1.5em;"><a href="{{ url('galery')}}" class="button big alt">move to gallery</a></li>
            </ul>
            </div>

    </section>
    <!-- Galery>
    <!-- Three -->
    <section id="three" class="wrapper style3 special">
        <div class="inner">
            <header class="major narrow	">
                <h2>personal details of company</h2>
                <p>Address, contact no ,and others</p>
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
            <form action="#" method="POST">
                <div class="container 75%">
                    <div class="row uniform 50%">
                        <div class="6u 12u$(xsmall)">
                            <input name="name" placeholder="Name" type="text" />
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input name="email" placeholder="Email" type="email" />
                        </div>
                        <div class="12u$">
                            <textarea name="message" placeholder="Message" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <ul class="actions">
                    <li>
                        <input type="submit" class="special" value="Submit" />
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
			@endsection
