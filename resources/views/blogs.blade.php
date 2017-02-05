@section('title')
Blogs
@endsection

@extends('layouts.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major" style="margin-bottom: 2em;">
			<h2>Blog</h2>
			<p>Blog posts of some of the students on the team.</p>
		</header>
		<section style="margin-bottom: 100px;">
			@foreach($blogs as $blog)
				<a href="{{url('/blogs/' . $blog->id)}}"><h2>{{$blog->title}}</h2></a>
				<h3>{{$blog->description}}</h3>
				<p>By {{$blog->name}}</p>
				 @if(Auth::user() && Auth::user()->verified) <a href="/admin/blog/edit/{{$blog->id}}" class="button small special" style="background-color: #FF9F1C;">Edit</a><a href="/admin/blog/remove/{{$blog->id}}" class="button small special" style="background-color: #ED4F32; margin-left: 10px;">Remove</a>@endif
			@endforeach
		</section>
	</div>
</div>
@endsection