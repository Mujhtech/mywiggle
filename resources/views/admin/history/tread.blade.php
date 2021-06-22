@extends('layout.admin')

@section('title', 'Tread History')

@section('breadcrum', 'Tread History')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Tread History</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Description</th>
								<th scope="col">Created On</th>
							</tr>
						</thead>
						<tbody>
							@if(count($history) > 0)
	                        @php $sn = 0 @endphp
	                        @foreach($history as $hist)
	                        @php $sn++ @endphp
								<tr>
									<th scope="row">{{ $sn }}</th>
									<td><strong>{{ $hist->user->username }}</strong> share <strong>{{ $hist->tread->title }}</strong> and earn points</td>
									<td>{{ $hist->created_at->diffForHumans() }}</td>
								</tr>
							@endforeach
							@else
								<tr>
									<td colspan="5" style="text-align: center;">No data found</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $history->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection