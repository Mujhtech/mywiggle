@extends('layout.admin')

@section('title', $user->username)

@section('breadcrum', $user->username)

@section('content')


<div class="row">
	<div class="col-xl-4 col-md-6">
		<div class="card card-statistics widget-social-box1 px-2">
			<div class="card-body pb-3 pt-4">
				<div class="text-center">
					<div class="pt-1 bg-img m-auto"><img class="img-fluid" src="{{ $user->profile_photo_url }}" alt="socialwidget-img"></div>
					<div class="mt-3">
						<h4 class="mb-1">{{ $user->username }}</h4>
						<ul class="nav justify-content-between mt-4 px-3 py-2">
							<li class="flex-fill">
								<h3 class="mb-0">{{ $treads->count() }}</h3>
								<p>Treads</p>
							</li>
							<li class="flex-fill">
								<h3 class="mb-0">700</h3>
								<p>Videos</p>
							</li>
						</ul>
						<p class="mt-3">Since there is not an "all the above" category, I'll take the opportunity to enthusiastically congratulate you on the very high quality, "user-friendly" documentation.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection