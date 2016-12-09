@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<h1>Inquiries</h1>
		<div class="table-wrapper">
			<table class="alt">
				<thead>
					<tr>
						<th style="text-align: center;">Name</th>
						<th style="text-align: center;">Email</th>
						<th style="text-align: center;">Message</th>
						<th style="text-align: center;">Replied To</th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">
					@foreach($inquiries as $inquiry)
					<tr>
						<td style="vertical-align: middle;">{{$inquiry->name}}</td>
						<td style="vertical-align: middle;">{{$inquiry->email}}</td>
						<td style="text-align: left; max-width: 300px;vertical-align: middle;">{{$inquiry->message}}</td>
						<td style="vertical-align: middle;">
							@if($inquiry->replied_to)
								Yes
							@else
								No
							@endif
						</td>
						<td style="vertical-align: middle;">
							@if($inquiry->replied_to == true)
								<a href="/admin/inquiries/reply/{{$inquiry->id}}" class="button special" style="background-color: #0069ff;">Reply Again</a>
								&nbsp;&nbsp;
								<a href="/admin/inquiries/remove/{{$inquiry->id}}" class="button special" style="background-color: #ED4F32;">Remove</a>
							@else
								<a href="/admin/inquiries/reply/{{$inquiry->id}}" class="button special" style="background-color: #15CD72;">Reply</a>
								&nbsp;&nbsp;
								<a href="/admin/inquiries/remove/{{$inquiry->id}}" class="button special" style="background-color: #ED4F32;">Remove</a>
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