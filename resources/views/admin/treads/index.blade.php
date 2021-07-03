@extends('layout.admin')

@section('title', 'All Treads')

@section('breadcrum', 'All Treads')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">All Treads</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="{{ route('admin.e.treads') }}">
					@csrf
					<div class="table-responsive">
						<table class="table table-bordered mb-0">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Ads</th>
									<th scope="col">Sponsored</th>
									<th scope="col">Treading</th>
									<th scope="col">Title</th>
									<th scope="col">Category</th>
									<th scope="col">Created on</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(count($treads) > 0)
		                        @php $sn = 0 @endphp
		                        @foreach($treads as $tread)
		                        @php $sn++ @endphp
		                        	<input type="hidden" name="treads[]" value="{{ $tread->id }}">
									<tr>
										<th scope="row">{{ $sn }}</th>
										<th>
											<div class="checkbox checbox-switch switch-success">
			                                    <label>
			                                        <input type="checkbox" name="ads[]" @if($tread->is_ads) checked @endif>
			                                        <span></span>
			                                    </label>
			                                </div>
										</th>
										<th>
											<div class="checkbox checbox-switch switch-success">
			                                    <label>
			                                        <input type="checkbox" name="sponsored[]" @if($tread->is_sponsored) checked @endif>
			                                        <span></span>
			                                    </label>
			                                </div>
										</th>
										<th>
											<div class="checkbox checbox-switch switch-success">
			                                    <label>
			                                        <input type="checkbox" name="trending[]" @if($tread->is_trending) checked @endif>
			                                        <span></span>
			                                    </label>
			                                </div>
										</th>
										<td>{{ $tread->title }}</td>
										<td>{{ $tread->category->name }}</td>
										<td>{{ $tread->created_at->diffForHumans() }}</td>
										<td>
											@if($tread->status == 1)
												<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Publish</span>
											@elseif($tread->status == 2)
												<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">Unpublish</span>
											@else
												<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Pending</span>
											@endif
										</td>
										<td>
	                                        <a href="{{ route('web.single', ['slug' => $tread->slug]) }}" class="btn btn-icon btn-round btn-info" title="View {{ $tread->title }}" target="_blank"><i class="fa fa-file-movie-o"></i></a>
	                                        <a href="{{ route('admin.p.tread', ['id' => $tread->id]) }}" class="btn btn-icon btn-round btn-primary" title="Publish {{ $tread->title }}"><i class="fa fa-check"></i></a>
	                                        <a href="{{ route('admin.unp.tread', ['id' => $tread->id]) }}" class="btn btn-icon btn-round btn-warning" title="Unpublish {{ $tread->title }}"><i class="fa fa-close"></i></a>
	                                        <a href="{{ route('admin.e.tread', ['id' => $tread->id]) }}" class="btn btn-icon btn-round btn-success" title="Edit {{ $tread->title }}"><i class="fa fa-edit"></i></a>
	                                        <a href="{{ route('admin.d.tread', ['id' => $tread->id]) }}" class="btn btn-icon btn-round btn-danger" title="Delete {{ $tread->title }}"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								@endforeach
								@else
									<tr>
										<td colspan="9" style="text-align: center;">No data found</td>
									</tr>
								@endif
							</tbody>
						</table>
						@if(count($treads) > 0)
						<br><button type="submit" class="btn btn-primary">Make Changes</button>
						@endif
						{{ $treads->links('vendor.pagination.custom') }}
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection