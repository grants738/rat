@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<h1>Update A News Post</h1>
		<section>
			<form action="/admin/news/edit/{{$post->id}}" method="POST" enctype="multipart/form-data">
				<div class="row 50% uniform">
					<div class="12u$">
						<input type="text" name="title" placeholder="Title" autocomplete="off" value="{{$post->title}}">
					</div>
					<div class="12u$">
						<textarea name="body" placeholder="Body of the news post" rows="4">{{$post->body}}</textarea>
					</div>
					<div class="12u$">
						<span class="image">
							<img src="{{$post->image_url}}" @if(!$post->image_url) hidden @endif style="max-width: 200px; max-height: 200px;">
						</span>
						<br>
						<label for="image" class="button special" style="background-color: #0069ff;">Change Image</label>
						<input type="file" id="image" name="image" style="display: none;">
					</div>
					<div class="12u$">
						<input type="submit" class="button special" value="Update" style="background-color: #15CD72;">
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</section>
	</div>
</div>
@endsection