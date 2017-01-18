@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<h1>Visitor Locations</h1>
		<a href="/admin/stats/table/clear" class="button special" style="background-color: #0069ff;">Clear Table</a>
		<div class="table-wrapper">
			<table class="alt">
				<thead>
					<tr>
						<th style="text-align: center;">Country</th>
						<th style="text-align: center;">State</th>
						<th style="text-align: center;">City</th>
						<th style="text-align: center;">Time</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">
					@foreach($locations as $location)
					<tr>
						<td style="vertical-align: middle;">{{$location->country}}</td>
						<td style="vertical-align: middle;">{{$location->state}}</td>
						<td style="vertical-align: middle;">{{$location->city}}</td>
						<td style="vertical-align: middle;">{{$location->created_at->diffForHumans()}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection