@extends('layout.admin')

@section('title', 'All Payments')

@section('breadcrum', 'All Payments')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">All Payments</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Username</th>
								<th scope="col">Amount (Naira)</th>
								<th scope="col">Account Number</th>
								<th scope="col">Account Name</th>
								<th scope="col">Bank</th>
								<th scope="col">Created At</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($payments) > 0)
	                        @php $sn = 0 @endphp
	                        @foreach($payments as $payment)
	                        @php $sn++ @endphp
								<tr>
									<th scope="row">{{ $sn }}</th>
									<td>{{ $payment->user->username }}</td>
									<td>{{ $payment->amount }}</td>
									<td>{{ $payment->account_number }}</td>
									<td>{{ $payment->account_name }}</td>
									<td>{{ $payment->bank_name }}</td>
									<td>{{ $payment->created_at->diffForHumans() }}</td>
									<td>
										@if($payment->status == 1)
											<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Approved</span>
										@else
											<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Pending</span>
										@endif
									</td>
									<td>
										@if($payment->status == 0)
                                        <a href="{{ route('admin.app.payment', ['id' => $payment->id]) }}" class="btn btn-icon btn-round btn-success" title="Approve {{ $payment->user->username }}"><i class="fa fa-check"></i></a>
                                        <a href="{{ route('admin.d.payment', ['id' => $payment->id]) }}" class="btn btn-icon btn-round btn-danger" title="Delete {{ $payment->user->username }}"><i class="fa fa-trash"></i></a>
                                        @endif
									</td>
								</tr>
							@endforeach
							@else
								<tr>
									<td colspan="7" style="text-align: center;">No data found</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $payments->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection