<!DOCTYPE HTML>

<html>
	<head>
		<title>Micro site</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{URL::to('assets')}}/micro/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.html">Company Head Name</a></h1>
				<a href="">signup</a>
				<a href="">login</a>
				<a href="#nav">Menu</a>

			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="generic.html">Generic</a></li>
					<li><a href="elements.html">Elements</a></li>
					<li><a href="elements.html">packages links</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<i class="icon fa-diamond"></i>
				<h2>Company Name</h2>
				<p>Welcome to ! Company Name</p>

			</section>

		<!-- One -->

			<section id="one" class="wrapper style1">
				<div class="inner">
					<article class="feature left">
						<span class="image"><img src="{{URL::to('assets')}}/micro/images/pic01.jpg" alt="" /></span>
						<div class="content">
							<h2>popular Package details</h2>
							<p>Description</p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">other details of package</a>
								</li>
							</ul>
						</div>
					</article>
					<article class="feature right">
						<span class="image"><img src="{{URL::to('assets')}}/micro/images/pic02.jpg" alt="" /></span>
						<div class="content">
							<h2>popular Package details</h2>
							<p>Description</p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">other details of package </a>
								</li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>photos gallery</h2>
						<p>Best photos</p>
					</header>
					<div class="image-grid">
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic03.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic04.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic05.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic06.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic07.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic08.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic09.jpg" alt="" /></a>
						<a href="#" class="image"><img src="{{URL::to('assets')}}/micro/images/pic10.jpg" alt="" /></a>
					</div>
					<ul class="actions">
						<li><a href="#" class="button big alt">move to gallery</a></li>
					</ul>
				</div>
			</section>

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
							<li><input type="submit" class="special" value="Submit" /></li>
							<li><input type="reset" class="alt" value="Reset" /></li>
						</ul>
					</form>
				</div>
			</section>

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

		<!-- Scripts -->
			<script src="{{URL::to('assets')}}/micro/js/jquery.min.js"></script>
			<script src="{{URL::to('assets')}}/micro/js/skel.min.js"></script>
			<script src="{{URL::to('assets')}}/micro/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{URL::to('assets')}}/micro/js/main.js"></script>

	</body>
</html>
