@if(Session::has('success') || Session::has('info') || Session::has('error') || count($errors) > 0)
	<div>
		<section style="text-align: center;">
			@if(Session::has('success'))
				<div class="button special fit" style="background-color: #10A058; cursor: default;">{{ Session::get('success') }}</div>
			@elseif(Session::has('info'))
				<div class="button special fit" style="background-color: #0069ff; cursor: default;">{{ Session::get('info') }}</div>
			@elseif(Session::has('error'))
				<div class="button special fit" style="background-color: #ED4F32; cursor: default;">{{ Session::get('error') }}</div>
			@endif
		</section>

		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<section style="text-align: center;">
					<div class="button special fit" style="background-color: #ED4F32; cursor: default;">{{ $error }}</div>
				</section>
			@endforeach
		@endif
	</div>
@endif