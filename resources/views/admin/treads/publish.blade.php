@extends('layout.admin')

@section('title', 'Publish Treads')

@section('breadcrum', 'Publish Treads')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Publish Treads</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Title</th>
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
								<tr>
									<th scope="row">{{ $sn }}</th>
									<td>{{ $tread->title }}</td>
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
                                        <a href="{{ route('admin.unp.tread', ['id' => $tread->id]) }}" class="btn btn-icon btn-round btn-warning" title="Unpublish {{ $tread->title }}"><i class="fa fa-close"></i></a>
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
					{{ $treads->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection