@extends('admin.default')

@section('content')
<div id="main" class="wrapper style1">
	<div class="container">
		<h1>Create A New News Post</h1>
		<section>
			<form action="/admin/news" method="POST" enctype="multipart/form-data">
				<div class="row 50% uniform">
					<div class="12u$">
						<input type="text" name="title" placeholder="Title" autocomplete="off">
					</div>
					<div class="12u$">
						<textarea name="body" placeholder="Body of the news post" rows="4"></textarea>
					</div>
					<div class="12u$">
						<label for="image" class="button special" style="background-color: #0069ff;">Upload An Image</label>
						<input type="file" id="image" name="image" style="display: none;">
					</div>
					<div class="12u$">
						<input type="submit" class="button special" value="Post" style="background-color: #15CD72;">
					</div>
				</div>
				{{csrf_field()}}
			</form>
			<section style="text-align: center;">
				<a href="{{url('/admin/news/edit')}}" class="button special">Or Edit an Existing Post</a>
			</section>
		</section>
	</div>
</div>
@endsection