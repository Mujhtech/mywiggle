@extends('layout.admin')

@section('title', 'Edit Tread')

@section('breadcrum', 'Edit Tread')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Edit Tread</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.p.user') }}">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Title</label>
							<input type="text" class="form-control" name="title" placeholder="Title" value="{{ $tread->title }}">
							@if($errors->has('title'))
							<small>{!!  $errors->get('title')[0] !!}</small>
							@endif
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Category</label>
							<select class="form-control" name="category" required>
	                            <option>Select Category</option>
	                            @foreach($category as $cat)
	                                <option value="{{$cat->id}}" @if($tread->category_id == $cat->id) selected @endif> {{$cat->name}}</option>
	                            @endforeach
                        	</select>
							@if($errors->has('category'))
							<small>{!!  $errors->get('category')[0] !!}</small>
							@endif
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Attached Video</label>
							<input class="form-control" type="file" name="attachment" accept="video/*" required />
							@if($errors->has('attachment'))
							<small>{!!  $errors->get('attachment')[0] !!}</small>
							@endif
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Attached Featured Image</label>
							<input class="form-control" type="file" name="featured_image" accept="image/*" required />
							@if($errors->has('featured_image'))
							<small>{!!  $errors->get('featured_image')[0] !!}</small>
							@endif
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Content</label>
							<textarea class="form-control" name="content" placeholder="Content" require>{{ $tread->content }}</textarea>
							@if($errors->has('content'))
							<small>{!!  $errors->get('content')[0] !!}</small>
							@endif
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection