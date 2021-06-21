@extends('layout.admin')

@section('title', 'Edit User')

@section('breadcrum', 'Edit User')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Edit User</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.p.user') }}">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Full Name</label>
							<input type="text" class="form-control" name="fullname" placeholder="Full Name">
							@if($errors->has('fullname'))
							<small>{!!  $errors->get('fullname')[0] !!}</small>
							@endif
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">@</span>
								</div>
								<input type="text" class="form-control" name="username" placeholder="Username">
								@if($errors->has('username'))
								<small>{!!  $errors->get('username')[0] !!}</small>
								@endif
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Email</label>
							<input type="text" class="form-control" name="email" placeholder="Email">
							@if($errors->has('email'))
							<small>{!!  $errors->get('email')[0] !!}</small>
							@endif
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Phone Number</label>
							<input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
							@if($errors->has('phone_number'))
							<small>{!!  $errors->get('phone_number')[0] !!}</small>
							@endif
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
							@if($errors->has('password'))
							<small>{!!  $errors->get('password')[0] !!}</small>
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