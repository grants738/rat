<!DOCTYPE HTML>
<html lang='en'>
	<head>
		<title>{{config('app.name')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta description="The official Embry-Riddle Application Team Site" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url('assets/css/main.css')}}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style>
			.team {
				max-width: 92px;
				max-height: 92px;
			}

			.image {
				margin-bottom: 2em;
			}
		</style>
	</head>
	<body>
		<div id="page-wrapper">
			<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="{{url('/')}}">{{config('app.name2')}}</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('/apps')}}">Apps</a></li>
						<li><a href="{{url('/news')}}">News</a></li>
						<li><a href="{{url('/contact')}}" class="button special">Contact</a></li>
						@if(Auth::user())
							@if(Auth::user()->verified)
								<li><a href="{{url('/admin')}}">Admin</a></li>
							@endif
						@endif
					</ul>
				</nav>
			</header>
			<section>
			    @include('flash')
			</section>
			@yield('content')

			<!-- Footer -->
			<footer id="footer">
			    <ul class="icons">
			        <!--<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
			        <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
			        <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
			        <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>-->
			        <li><a href="https://github.com/EagleApplicationTeam" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
			        <li><a href="mailto:savageg2@my.erau.edu" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
			    </ul>
			    <ul class="copyright">
			        <li>&copy; <span id="year"></span> {{config('app.name2')}}. All rights reserved.</li>
			    </ul>
			</footer>
		</div>

		<!-- Scripts -->
		<script src="{{url('assets/js/jquery.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.scrolly.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.dropotron.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.scrollex.min.js')}}"></script>
		<script src="{{url('assets/js/skel.min.js')}}"></script>
		<script src="{{url('assets/js/util.js')}}"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="{{url('assets/js/main.js')}}"></script>
		<script>
			// Automattically Set Copyright Year
			var year = new Date();
			year = year.getFullYear();
			$("#year").text(year);
		</script>
		@yield('script')
	</body>
</html>