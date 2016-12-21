@extends('layouts.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major" style="margin-bottom: 2em;">
			<h2>News</h2>
			<p>Some of the stuff we're doing or planning on doing</p>
		</header>
		<section style="margin-bottom: 100px;">
			@foreach($posts as $post)
				<h3 @if($post->id % 2 != 0) style="text-align: right;" @endif>{{$post->title}} <span style="font-size: 15px; margin-left: 30px;">{{$post->created_at->diffForHumans()}}</span> @if(Auth::user() && Auth::user()->verified) <a href="/admin/news/edit/{{$post->id}}" class="button small special" style="background-color: #FF9F1C; margin-left: 40px;">Edit</a><a href="/admin/news/remove/{{$post->id}}" class="button small special" style="background-color: #ED4F32; margin-left: 10px;">Remove</a>@endif</h3>
				<p style="margin-bottom: 120px;">
					@if($post->id % 2 == 0)
						<span class="image left" style="margin-bottom: 100px; max-width: 200px; max-height: 200px;">
							<img src=@if($post->image_url)"{{$post->image_url}}"@else"/images/pic01.jpg"@endif alt="" /></span>
						</span>
					@else
						<span class="image right" style="margin-bottom: 100px; max-width: 200px; max-height: 200px;">
							<img src=@if($post->image_url)"{{$post->image_url}}"@else"/images/pic01.jpg"@endif alt="" /></span>
						</span>
					@endif
				{{$post->body}}
				</p>
			@endforeach
		</section>
	</div>
</div>
@endsection