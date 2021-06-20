@extends('layout.admin')

@section('title', 'Create new user')

@section('breadcrum', 'Create new user')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Create new user</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="">
					@csrf
					
				</form>
			</div>
		</div>
	</div>
</div>

@endsection