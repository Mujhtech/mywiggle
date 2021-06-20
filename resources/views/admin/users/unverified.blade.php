@extends('layout.admin')

@section('title', 'Unverified Users')

@section('breadcrum', 'Unverified Users')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Unverified Users</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Username</th>
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
									<td>{{ $user->username }}</td>
									<td>{{ $user->created_at->diffForHumans() }}</td>
									<td>{{ $user->last_login }}</td>
									<td>
                                        <a href="{{ route('admin.v.user', ['id' => $user->id]) }}" class="btn btn-icon btn-round btn-info" title="Verify {{ $user->username }}"><i class="fa fa-check"></i></a>
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
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
