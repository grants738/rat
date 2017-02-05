@section('title')
{{$blog->title}}
@endsection

@extends('layouts.default')
@section('content')
<!-- Main -->
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>{{$blog->title}}</h2>
			<p>{{$blog->description}}</p>
			<h4>By {{$blog->name}}</h4>
		</header>

		{!! $markdown !!}
		
	</div>
</div>