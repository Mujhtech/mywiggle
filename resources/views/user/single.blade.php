@extends('layout.user')

@section('title', $title.' - MyWiggle')

@section('content')

<section class="gen-section-padding-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="gen-episode-wrapper style-1">
					<div class="row">
						<div class="col-lg-12">
							<div class="gen-video-holder">
								<iframe width="100%" height="550px" src="{{ asset($tread->tread_video_path->video_url) }}"
								frameborder="0"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
								allowfullscreen></iframe>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="single-episode">
								<div class="gen-single-tv-show-info">
									<h2 class="gen-title">{{ $tread->title }}</h2>
									<div class="gen-single-meta-holder">
										<ul>
											<li><a href="{{ route('web.category', $tread->category->slug) }}"><span>{{ $tread->category->name }}</span></a></li>
											<li><a href="{{ route('web.addwl', $tread->slug) }}">Add to my watch list</a></li>
											<li>
												<i class="fas fa-eye">
												</i>
												<span>{{ $tread->views }} Views</span>
											</li>
											<li>
												<i class="fas fa-heart">
												</i>
												<span>{{ $tread->likes }} Likes</span>
											</li>
										</ul>
									</div>
									<p>{!! $tread->content !!}</p>
									<div class="gen-socail-share">
										<h4 class="align-self-center">Social Share :</h4>
										<ul class="social-inner">
											<li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $tread->slug]) }}" class="facebook"><i
												class="fab fa-facebook-f"></i></a>
											</li>
											<li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $tread->slug]) }}" class="facebook"><i
												class="fab fa-whatsapp"></i></a>
											</li>
											<li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $tread->slug]) }}" class="facebook"><i
												class="fab fa-twitter"></i></a></li>
											</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="pm-inner">
								<div class="gen-more-like">
									<h5 class="gen-more-title">More Like This</h5>
									<div class="row post-loadmore-wrapper">

										<!-- Categories here -->
										@foreach($tread->category->treads as $t)
											hi
										@endforeach
											
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="gen-movie-action">
								<div class="gen-btn-container">
									<a href="{{ route('web.category', $tread->category->slug) }}" class="gen-button">
										<span class="text">Load More</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Single Video End -->


@endsection