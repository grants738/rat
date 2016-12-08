@extends('layouts.default')
@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Contact Us</h2>
			<p>We'll get back to you as soon as possible...</p>
		</header>
		<section>
			<form method="post" action="#">
				<div class="row uniform 50%">
					<div class="6u 12u$(xsmall)">
						<input type="text" name="name" id="name" value="" placeholder="Name" />
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="email" name="email" id="email" value="" placeholder="Email" />
					</div>
					<div class="12u$">
						<textarea name="message" id="message" placeholder="Enter your message" rows="3" style="resize: none;"></textarea>
					</div>
					<div class="6u 12u$(medium)">
						<input type="checkbox" id="copy" name="copy">
						<label for="copy">Email me a copy of this message</label>
					</div>
					<div class="12u$">
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="special" /></li>
							<li><input type="reset" value="Reset" /></li>
						</ul>
					</div>
				</div>
			</form>
		</section>
	</div>
</div>
@endsection