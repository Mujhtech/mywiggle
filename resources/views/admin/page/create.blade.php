@extends('layout.admin')

@section('title', 'Create new page')

@section('breadcrum', 'Create new page')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Create new page</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.cp.page') }}">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Title</label>
							<input type="text" class="form-control" name="title" placeholder="Title">
							@if($errors->has('title'))
							<small>{!!  $errors->get('title')[0] !!}</small>
							@endif
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12 mb-3">
							<label for="">Content</label>
							<textarea class="form-control" name="content" placeholder="Content"></textarea>
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