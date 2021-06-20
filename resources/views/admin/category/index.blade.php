@extends('layout.admin')

@section('title', 'All Categories')

@section('breadcrum', 'All Categories')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">All Categories</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($categories) > 0)
	                        @php $sn = 0 @endphp
	                        @foreach($categories as $cat)
	                        @php $sn++ @endphp
								<tr>
									<th scope="row">{{ $sn }}</th>
									<td>{{ $cat->name }}</td>
									<td>
                                        <a href="{{ route('admin.d.category', ['id' => $cat->id]) }}" class="btn btn-icon btn-round btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
							@else
								<tr>
									<td colspan="3" style="text-align: center;">No data found</td>
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
