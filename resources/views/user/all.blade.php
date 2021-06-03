@extends('layout.user')
@section('content')
<section class="gen-section-padding-2">
	<div class="container">
		<br>
		<div class="row">
			@if(count($all) > 0)

			@foreach($all as $sh)
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="item">
					<div
					class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
					<div class="gen-carousel-movies-style-2 movie-grid style-2">
						<div class="gen-movie-contain">
							<div class="gen-movie-img">
								<img src="http://gentechtree.com/themes/streamlab/red-html/images/background/asset-41.jpg"
								alt="owl-carousel-video-image">
								<div class="gen-movie-add">
									<div class="wpulike wpulike-heart">
										<div class="wp_ulike_general_class wp_ulike_is_not_liked">
											<button type="button"
											class="wp_ulike_btn wp_ulike_put_image"></button>
										</div>
									</div>
									<ul class="menu bottomRight">
										<li class="share top">
											<i class="fa fa-share-alt"></i>
											<ul class="submenu">
												<li><a href="#" class="facebook"><i
													class="fab fa-facebook-f"></i></a>
												</li>
												<li><a href="#" class="facebook"><i
													class="fab fa-instagram"></i></a>
												</li>
												<li><a href="#" class="facebook"><i
													class="fab fa-twitter"></i></a></li>
												</ul>
											</li>
										</ul>
										<div class="movie-actions--link_add-to-playlist dropdown">
											<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
												class="fa fa-plus"></i></a>
												<div class="dropdown-menu mCustomScrollbar">
													<div class="mCustomScrollBox">
														<div class="mCSB_container">
															<a class="login-link" href="register.html">Sign in
																to add this
																movie to a
															playlist.</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="gen-movie-action">
											<a href="{{ route('web.single', $sh->slug) }}" class="gen-button">
												<i class="fa fa-play"></i>
											</a>
										</div>
									</div>
									<div class="gen-info-contain">
										<div class="gen-movie-info">
											<h3><a href="{{ route('web.single', $sh->slug) }}">{{ $sh->title }}</a>
											</h3>
										</div>
										<div class="gen-movie-meta-holder">
											<ul>
                                                <li>{{ $sh->created_at->diffForHumans() }}</li>
                                                <li>
                                                    <a href="{{ route('web.category', $sh->category->slug) }}"><span>{{ $sh->category->title }}</span></a>
                                                </li>
                                            </ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- #post-## -->
					</div>
			</div>
			@endforeach

			@else
			<div class="col-lg-3 col-md-6 col-xs-12">
				<h4>No result found</h4>
			</div>
			@endif

		</div>
	</div>
</section>

@endsection