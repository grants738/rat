@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<h2>Create or Edit A Blog Post</h2>
		<p><a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown Cheatsheet</a></p>
		<section>
			<form @if(isset($blog)) action="/admin/blog/update/{{$blog->id}}"  @else action="/admin/blog" @endif method="POST" enctype="multipart/form-data">
				<div class="row 50% uniform">
					<div class="12u$">
						<input type="text" name="title" placeholder="Title" autocomplete="off" @if(isset($blog)) value="{{$blog->title}}" @endif>
					</div>
					<div class="12u$">
						<input type="text" name="description" placeholder="Description" autocomplete="off" @if(isset($blog)) value="{{$blog->description}}" @endif>
					</div>
					<div class="12u$">
						<textarea name="body" placeholder="Markdown goes here" rows="10">@if(isset($blog)) {{$blog->body}} @endif</textarea>
					</div>
					<div class="12u$">
						@if(isset($blog))
							<input type="submit" class="button special" value="Update" style="background-color: #15CD72;">
						@else
							<input type="submit" class="button special" value="Post" style="background-color: #15CD72;">
						@endif	
					</div>
				</div>
				{{csrf_field()}}
			</form>
			@if(!isset($blog))
			<section style="text-align: center;">
				<a href="{{url('/news')}}" class="button special">Or Edit an Blog Post</a>
			</section>
			@endif
		</section>
	</div>
</div>
@endsection