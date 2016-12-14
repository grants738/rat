@extends('admin.default')

@section('content')
	<div id="main" class="wrapper style1">
		<div class="container">
			<header class="major">
				<h2>Site Statistics</h2>
			</header>
			<section style="text-align: center;">
				<div class="row">
					<div class="4u">
						<h2>Views</h2>
						<canvas id="views" height="300"></canvas>
					</div>
					<div class="4u">
						<h2>Inquiries</h2>
						<canvas id="inquiries" height="300"></canvas>
					</div>
					<div class="4u">
						
					</div>
				</div>
			</section>
		</div>
	</div>
@endsection

@section('stats')
<script>
	var viewsData = {
		labels: ['Home','News','Apps'],
		datasets: [
		    {
		        data: [{{$views}},{{$news}},{{$apps}}],
		        backgroundColor: [
	                "#DD323A",
	                "#E35947",
	                "#F88B6E"
	            ]
		    }
		]
	}
	var views = document.querySelector('#views').getContext('2d');
	new Chart(views, {
	  type: 'pie',
	  data: viewsData
	});
	var inquiriesData = {
		labels: ["January", "February"],
	    datasets: [
	        {
	            label: "Inquiries",
	            backgroundColor: [
	                '#DD323A',
	                '#E35947',
	            ],
	            borderWidth: 1,
	            data: [20,40,0],
	        }
	    ]
	}
	var inquiries = document.querySelector('#inquiries').getContext('2d');
	new Chart(inquiries, {
		type: 'bar',
		data:  inquiriesData
	});
</script>
@endsection