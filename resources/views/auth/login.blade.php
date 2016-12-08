@extends('layouts.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Admin Login</h2>
			<p>Verified admins can login here</p>
		</header>
		<section>
			<h3>Login</h3>
			<form method="post" action="/admin/login">
				<div class="row uniform 50%">
					<div class="6u 12u$(xsmall)">
						<input type="email" name="email" id="email" value="" placeholder="Email" />
					</div>
					<div class="6u 12u$(xsmall)">
						<input type="password" name="password" id="password" value="" placeholder="Password" />
					</div>
					<div class="12u$">
						<ul class="actions">
							<li><input type="submit" value="Login" class="special" /></li>
						</ul>
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</section>
	</div>
</div>
@endsection