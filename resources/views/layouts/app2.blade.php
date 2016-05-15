<!DOCTYPE HTML>

<html>

<head>
    <title>Micro site</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->



    <link href="{{URL::to('assets')}}/vendors/bower_components/lightgallery/light-gallery/css/lightGallery.css" rel="stylesheet">

    <!-- CSS -->

    <link href="{{URL::to('assets')}}/css/app.min.3.css" rel="stylesheet">


</head>

<body class="landing">

    <!-- Header -->
    <header id="header" class="alt">

        <h1><a href="#">{{ $fullname }}</a></h1>
       <!-- <a href="">signup</a>
        <a href="">login</a>-->
        <a href="#nav">Menu</a>

    </header>
     <section id="banner">
    @yield('contents')
    </section>

    <!-- Nav -->
    <nav id="nav">
        <ul class="links">
         <!--   <li><a href="#">Home</a></li>
           <li><a href="{{ url('morepackage')}}">More package</a></li>
        --></ul>
    </nav>



		<div>

		     @yield('content')
		</div>


		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>

				</div>
			</footer>
 @yield('footer')
		 <!-- Scripts -->
    <script src="{{URL::to('assets')}}/micro/js/jquery.min.js"></script>
    <script src="{{URL::to('assets')}}/micro/js/skel.min.js"></script>
    <script src="{{URL::to('assets')}}/micro/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="{{URL::to('assets')}}/micro/js/main.js"></script>


    <!-- Scripts for light galery-->

    <script src="{{URL::to('assets')}}/vendors/bower_components/Waves/dist/waves.min.js"></script>
    <script src="{{URL::to('assets')}}/vendors/bower_components/lightgallery/light-gallery/js/lightGallery.min.js"></script>
    <script src="{{URL::to('assets')}}/js/functions.js"></script>



</body>

</html>
