@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>News Posts and BLogs</h2>
			<p>Create news posts and student blogs.</p>
		</header>
		<section style="text-align: center;">
			<div class="row">
				<div class="6u">
					<a href="{{url('/admin/news')}}" class="button special">News Posts</a>
				</div>
				<div class="6u">
					<a href="{{url('/admin/blog')}}" class="button special">Blog Posts</a>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection