@extends('admin.default')

@section('content')
	<div id="main" class="wrapper style1">
		<div class="container">
			<header class="major">
				<h2>Site Statistics</h2>
			</header>
			<section style="text-align: center;">
				<div class="row">
					<div class="6u">
						<h2>Views</h2>
						<canvas id="views" height="200"></canvas>
						<br>
						<h1>Views Today: {{$viewsToday}}</h1>
					</div>
					<div class="6u">
						<h2>Inquiries</h2>
						<canvas id="inquiries" height="200"></canvas>
					</div>
				</div>
			</section>
		</div>
	</div>
@endsection

@section('stats')
<script>
	Chart.defaults.global.defaultFontColor = '#FFFFFF';
	Chart.defaults.global.defaultColor = '#FFFFFF';
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
	  data: viewsData,
	  options: {
	  	legend: {
	  		labels: {
	  			fontColor: 'white'
	  		}
	  	}
	  }
	});
	var inquiriesData = {
		labels: ["Previous Month", "Current Month"],
	    datasets: [
	        {
	            label: "Inquiries",
	            backgroundColor: [
	                '#DD323A',
	                '#E35947',
	            ],
	            borderWidth: 1,
	            borderColor: 'white',
	            data: [{{$previousMonth}},{{$thisMonth}}],
	        }
	    ]
	}
	var inquiries = document.querySelector('#inquiries').getContext('2d');
	var options = {
		showScale: true,
		scaleShowGridLines: true,
		borderColor: 'white',
		legend: {
			display: false,
			labels: {
				fontColor: 'white'
			}
		},
	    scales: {
	    	fontColor: 'white',
	        yAxes: [{
	        	display: true,
	            ticks: {
	                beginAtZero: true,   // minimum value will be 0.
	                scaleSteps : 10,
	                stepSize: 1,
	            },
	            labels: {
	            	fontColor: 'white'
	            },
	            gridLines: {
	            	color: 'white',
	            	zeroLineColor: 'white'
	            }
	        }],
	        xAxes: [{
	        	display: true,
	        	labels: {
	            	fontColor: 'white'
	            },
	            gridLines: {
	            	color: 'white',
	            	zeroLineColor: 'white'
	            }
	        }],
	    }
	};
	var chart = new Chart(inquiries, {
		type: 'bar',
		data:  inquiriesData,
		options: options
	});
</script>
@endsection