@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Admin Dashboard</h2>
			<p>Create news posts, reply to contact inquiries, verify new admins, and view site stats.</p>
		</header>
		<section style="text-align: center;">
			<div class="row">
				<div class="3u">
					<a href="{{url('/admin/news')}}" class="button special">News Posts</a>
				</div>
				<div class="3u">
					<a href="{{url('/admin/inquiries')}}" class="button special">Inquiries</a>
				</div>
				<div class="3u">
					<a href="{{url('/admin/users')}}" class="button special">Admin Control</a>
				</div>
				<div class="$3u">
					<a href="{{url('/admin/stats')}}" class="button special">Site Stats</a>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection