@extends('layouts.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Register To Be an Admin</h2>
			<p>This registration is intended for team members only</p>
		</header>
		<section>
			<h3>Register</h3>
			<form method="post" action="/admin/register">
				<div class="row uniform 50%">
					<div class="6u 12u$(xsmall)">
						<input type="text" name="name" id="name" value="" placeholder="Name" />
					</div>
					<div class="6u 12u$(xsmall)">
						<input type="email" name="email" id="email" value="" placeholder="john.doe@example.com" />
					</div>
					<div class="6u u12u$(xsmall)">
						<input type="password" name="password" id="password" value="" placeholder="Password" />
					</div>
					<div class="6u 12u$(xsmall)">
						<input type="password" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirm Password" />
					</div>
				</div>
				<div class="row uniform 50%">
					<div class="12u$">
						<ul class="actions">
							<li><input type="submit" value="Register" class="special" /></li>
						</ul>
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</section>
	</div>
</div>
@endsection