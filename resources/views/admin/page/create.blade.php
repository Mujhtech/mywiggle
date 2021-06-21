@extends('layout.admin')

@section('title', 'Create new user')

@section('breadcrum', 'Create new user')

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
				<form method="POST" action="{{ route('admin.p.user') }}">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Full Name</label>
							<input type="text" class="form-control" name="fullname" placeholder="Full Name">
							@if($errors->has('cat_name'))
							<div class="valid-feedback">{!!  $errors->get('cat_name')[0] !!}</div>
							@endif
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12 mb-3">
							<label for="">Content</label>
							<input type="text" class="form-control" name="email" placeholder="Email">
							@if($errors->has('content'))
							<div class="valid-feedback">{!!  $errors->get('content')[0] !!}</div>
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