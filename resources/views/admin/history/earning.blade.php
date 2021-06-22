@extends('layout.admin')

@section('title', 'All Earnings')

@section('breadcrum', 'All Earnings')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">All Earnings</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Username</th>
								<th scope="col">Description</th>
								<th scope="col">Amount (Point)</th>
								<th scope="col">Created On</th>
							</tr>
						</thead>
						<tbody>
							@if(count($earnings) > 0)
	                        @php $sn = 0 @endphp
	                        @foreach($earnings as $earning)
	                        @php $sn++ @endphp
								<tr>
									<th scope="row">{{ $sn }}</th>
									<td>{{ $earning->user->username }}</td>
									<td>{{ $earning->description }}</td>
									<td>{{ $earning->amount }}</td>
									<td>{{ $earning->created_at->diffForHumans() }}</td>
								</tr>
							@endforeach
							@else
								<tr>
									<td colspan="5" style="text-align: center;">No data found</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $earnings->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection