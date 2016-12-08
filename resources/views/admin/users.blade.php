@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<h1>Admins</h1>
		<div class="table-wrapper">
			<table class="alt">
				<thead>
					<tr>
						<th style="text-align: center;">Name</th>
						<th style="text-align: center;">Email</th>
						<th style="text-align: center;">Verified</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							@if($user->verified == true)
								Yes
							@else
								No
							@endif
						</td>
						<td>
							@if($user->id != Auth::id())
								@if($user->verified == true)
									<a href="/admin/users/revoke/{{$user->id}}" class="button special" style="background-color: #FF9F1C;">Revoke</a>
									&nbsp;&nbsp;
									<a href="/admin/users/remove/{{$user->id}}" class="button special" style="background-color: #ED4F32;">Remove</a>
								@else
									<a href="/admin/users/verify/{{$user->id}}" class="button special" style="background-color: #15CD72;">Verify</a>
									&nbsp;&nbsp;
									<a href="/admin/users/remove/{{$user->id}}" class="button special" style="background-color: #ED4F32;">Remove</a>
								@endif
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection