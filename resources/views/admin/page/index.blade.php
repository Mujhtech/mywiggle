@extends('layout.admin')

@section('title', 'All Pages')

@section('breadcrum', 'All Pages')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">All Pages</h4>
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
							@if(count($pages) > 0)
	                        @php $sn = 0 @endphp
	                        @foreach($pages as $page)
	                        @php $sn++ @endphp
								<tr>
									<th scope="row">{{ $sn }}</th>
									<td>{{ $page->title }}</td>
									<td>{{ $page->created_at->diffForHumans() }}</td>
									<td>
										@if($page->status == 1)
											<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-success">Publish</span>
										@else
											<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Unpublish</span>
										@endif
									</td>
									<td>
                                        <a href="{{ route('web.page', ['slug' => $page->slug]) }}" class="btn btn-icon btn-round btn-info" title="View {{ $page->title }}" target="_blank"><i class="fa fa-file-movie-o"></i></a>
                                        <a href="{{ route('admin.p.page', ['id' => $page->title]) }}" class="btn btn-icon btn-round btn-primary" title="Publish {{ $page->title }}"><i class="fa fa-check"></i></a>
                                        <a href="{{ route('admin.unp.page', ['id' => $page->title]) }}" class="btn btn-icon btn-round btn-warning" title="Unpublish {{ $page->title }}"><i class="fa fa-close"></i></a>
                                        <a href="{{ route('admin.e.page', ['id' => $page->id]) }}" class="btn btn-icon btn-round btn-success" title="Edit {{ $page->title }}"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.d.page', ['id' => $page->title]) }}" class="btn btn-icon btn-round btn-danger" title="Delete {{ $page->title }}"><i class="fa fa-trash"></i></a>
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
					{{ $pages->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection