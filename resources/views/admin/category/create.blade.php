@extends('layout.admin')

@section('title', 'Create new category')

@section('breadcrum', 'Create new category')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Create new category</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.p.category') }}">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="validationCustom01">Category Name</label>
							<input type="text" class="form-control" name="cat_name" placeholder="Category Name">
							@if($errors->has('cat_name'))
	                            <div class="valid-feedback">{!!  $errors->get('cat_name')[0] !!}</div>
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