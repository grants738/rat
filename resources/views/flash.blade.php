@if(Session::has('success'))
<section style="text-align: center;">
	<div class="button special fit" style="background-color: #10A058; cursor: default;">{{ Session::get('success') }}</div>
</section>
@elseif(Session::has('info'))
<section style="text-align: center;">
	<div class="button special fit" style="background-color: #0069ff; cursor: default;">{{ Session::get('info') }}</div>
</section>
@elseif(Session::has('error'))
<section style="text-align: center;">
	<div class="button special fit" style="background-color: #ED4F32; cursor: default;">{{ Session::get('error') }}</div>
</section>
@endif

@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<section style="text-align: center;">
			<div class="button special fit" style="background-color: #ED4F32; cursor: default;">{{ $error }}</div>
		</section>
	@endforeach
@endif