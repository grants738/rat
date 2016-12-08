@extends('layouts.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>News</h2>
			<p>Some of the stuff we're doing or planning on doing</p>
		</header>
		<section style="margin-bottom: 100px;">
			@foreach($posts as $post)
				<h3 @if($post->id % 2 != 0) style="text-align: right;" @endif>{{$post->title}}@if(Auth::user() && Auth::user()->verified)<a href="#" class="button small special" style="background-color: #FF9F1C;margin-left: 40px;">Edit</a>@endif</h3>
				<p style="margin-bottom: 200px;">
					@if($post->id % 2 == 0)
						<span class="image left" style="margin-bottom: 100px; max-width: 200px; max-height: 200px;">
							<img src="{{url($post->image_url)}}" alt="" /></span>
						</span>
					@else
						<span class="image right" style="margin-bottom: 100px; max-width: 200px; max-height: 200px;">
							<img src="{{url($post->image_url)}}" alt="" /></span>
						</span>
					@endif
				{{$post->body}}
				</p>
			@endforeach
		</section>
	</div>
</div>
@endsection