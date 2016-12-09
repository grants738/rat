@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<section>
			<form action="/admin/inquiries/reply/{{$inquiry->id}}" method="POST">
				<div class="row 50% uniform">
					<h4>In Reply To {{$inquiry->name}}</h4>
					<h4>{{$inquiry->name}}'s Message: </h4>
					<p style="margin-top: 3px;">{{$inquiry->message}}</p>
					<div class="12u$">
						<textarea id="reply" name="reply" placeholder="Your Reply" rows="4" style="resize: none;"></textarea>
					</div>
					<div class="12u$">
						<input type="submit" class="button special" value="Reply" style="background-color: #15CD72;">
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</section>
	</div>
</div>
@endsection