@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Admin Dashboard</h2>
			<p>Create news posts, reply to contact inquiries, and verify new admins.</p>
		</header>
		<section style="text-align: center;">
			<div class="row">
				<div class="4u">
					<a href="{{url('/admin/news')}}" class="button special">Create or Delete A News Post</a>
				</div>
				<div class="4u">
					<a href="{{url('/admin/inquiries')}}" class="button special">Reply To Inquiries</a>
				</div>
				<div class="4u">
					<a href="{{url('/admin/users')}}" class="button special">Verify A New Admin</a>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection