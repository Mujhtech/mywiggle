@extends('layout.admin')

@section('title', 'Create new ad')

@section('breadcrum', 'Create new ad')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Create new ad</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.cp.ad') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="validationCustom01">Ad Url</label>
							<input type="text" class="form-control" name="url" placeholder="Ad Url">
							@if($errors->has('url'))
	                            <small>{!!  $errors->get('url')[0] !!}</small>
	                        @endif
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationCustom01">Ad Poster/Flier</label>
							<input type="file" class="form-control" name="flier" accept="image/*">
							@if($errors->has('flier'))
	                            <small>{!!  $errors->get('flier')[0] !!}</small>
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