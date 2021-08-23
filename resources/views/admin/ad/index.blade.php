@extends('layout.admin')

@section('title', 'All Ads')

@section('breadcrum', 'All Ads')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">All Ads</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="{{ route('admin.s.ads') }}">
					@csrf
					<div class="table-responsive">
						<table class="table table-bordered mb-0">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Url</th>
									<th scope="col">Flier Url</th>
									<th scope="col">Status</th>
									<th scope="col">Make For Front</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(count($ads) > 0)
		                        @php $sn = 0 @endphp
		                        @foreach($ads as $ad)
		                        @php $sn++ @endphp
									<tr>
										<th scope="row">{{ $sn }}</th>
										<td><a href="{{ $ad->url }}" target="_blank">{{ $ad->url }}</a></td>
										<td><a href="{{ $ad->flier_url }}" target="_blank">View Flier</a></td>
										<td>
											<input type="hidden" name="ads[]" value="{{ $ad->id }}">
											<select name="status[]" class="form-control">
												<option value="1" @if($ad->status) selected @endif>Activated</option>
												<option value="0" @if(!$ad->status) selected @endif>Deactivated</option>
											</select>
										</td>
										<td>
											<select name="front[]" class="form-control">
												<option value="1" @if($ad->is_front) selected @endif>Yes</option>
												<option value="0" @if(!$ad->is_front) selected @endif>No</option>
											</select>
										</td>
										<td>
	                                        <a href="{{ route('admin.d.ad', ['ad' => $ad->id]) }}" class="btn btn-icon btn-round btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
						@if(count($ads) > 0)
						<br><button type="submit" class="btn btn-primary">Make Changes</button>
						@endif
						{{ $ads->links('vendor.pagination.custom') }}
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection
