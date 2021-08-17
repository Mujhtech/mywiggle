@extends('layout.admin')

@section('title', 'Active Users')

@section('breadcrum', 'Active Users')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Active Users</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<form method="post" action="{{ route('admin.upr.users') }}">
						@csrf
						<table class="table table-bordered mb-0">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Role</th>
									<th scope="col">Username</th>
									<th scope="col">Toal Points Earned</th>
									<th scope="col">Joined on</th>
									<th scope="col">Last Login</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(count($users) > 0)
								@php $sn = 0 @endphp
								@foreach($users as $user)
								@php $sn++ @endphp
									<tr>
										<th scope="row">{{ $sn }}</th>
										<td>
											<input type="hidden" name="users[]" value="{{ $user->id }}">
											<select name="roles[]" class="form-control">
												<option>Select Role</option>
												@foreach ($roles as $role)
													<option value="{{ $role->id }}" @if($role->id == $user->role_id) selected @endif>{{ $role->name }}</option>
												@endforeach
											</select>
										</td>
										<td>{{ $user->username }}</td>
										<td>{{ $user->points->sum('amount') }}</td>
										<td>{{ $user->created_at->diffForHumans() }}</td>
										<td>{{ $user->last_login }}</td>
										<td>
											<a href="{{ route('admin.vw.user', ['id' => $user->id]) }}" class="btn btn-icon btn-round btn-info" title="View {{ $user->username }}"><i class="fa fa-user-circle-o"></i></a>
											<a href="{{ route('admin.e.user', ['user' => $user->id]) }}" class="btn btn-icon btn-round btn-primary" title="Edit {{ $user->username }}"><i class="fa fa-edit"></i></a>
											<a href="{{ route('admin.unv.user', ['id' => $user->id]) }}" class="btn btn-icon btn-round btn-warning" title="Unverify {{ $user->username }}"><i class="fa fa-close"></i></a>
											<a href="{{ route('admin.d.user', ['id' => $user->id]) }}" class="btn btn-icon btn-round btn-danger" title="Delete {{ $user->username }}"><i class="fa fa-trash"></i></a>
											<a href="{{ route('admin.b.user', ['id' => $user->id]) }}" class="btn btn-icon btn-round btn-success" title="Block {{ $user->username }}"><i class="fa fa-lock"></i></a>
										</td>
									</tr>
								@endforeach
								@else
									<tr>
										<td colspan="5" style="text-align: center;">No data found</td>
									</tr>
								@endif
							</tbody>
						</table>
						@if(count($users) > 0)
						<br><button type="submit" class="btn btn-primary">Make Changes</button>
						@endif
						{{ $users->links('vendor.pagination.custom') }}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
