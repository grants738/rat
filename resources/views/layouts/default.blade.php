<!DOCTYPE HTML>
<html>
	<head>
		<title>{{config('app.name')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">
			<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="index.html">{{config('app.name2')}}</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/apps">Apps</a></li>
						<li><a href="/news">News</a></li>
						<li><a href="/contact" class="button special">Contact</a></li>
					</ul>
				</nav>
			</header>

			@yield('content')

			<!-- Footer -->
			<footer id="footer">
			    <ul class="icons">
			        <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
			        <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
			        <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
			        <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
			        <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
			        <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
			    </ul>
			    <ul class="copyright">
			        <li>&copy; {{config('app.name')}}. All rights reserved.</li>
			    </ul>
			</footer>
		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
	</body>
</html>