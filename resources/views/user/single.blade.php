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
										@if(count($related) > 0)
											@foreach($related as $t)
											<div class="col-lg-3 col-md-6 col-xs-12">
												<div class="item">
													<div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
														<div class="gen-carousel-movies-style-2 movie-grid style-2">
															<div class="gen-movie-contain">
																<div class="gen-movie-img">
																	<img src="{{ $t->featured_image_url }}"
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
																					<li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $t->slug]) }}" class="facebook"><i
																						class="fab fa-facebook-f"></i></a>
																					</li>
																					<li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $t->slug]) }}" class="facebook"><i
																						class="fab fa-whatsapp"></i></a>
																					</li>
																					<li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $t->slug]) }}" class="facebook"><i
																						class="fab fa-twitter"></i></a></li>
																					</ul>
																				</li>
																			</ul>
																			<div class="movie-actions--link_add-to-playlist dropdown">
																				<a class="dropdown-toggle" href="{{ route('web.addwl', $t->slug) }}" data-toggle="dropdown"><i
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
																				<a href="{{ route('web.single', $t->slug) }}" class="gen-button">
																					<i class="fa fa-play"></i>
																				</a>
																			</div>
																		</div>
																		<div class="gen-info-contain">
																			<div class="gen-movie-info">
																				<h3><a href="{{ route('web.single', $t->slug) }}">{{ $t->title }}</a>
																				</h3>
																			</div>
																			<div class="gen-movie-meta-holder">
																				<ul>
																					<li>{{ $t->created_at->diffForHumans() }}</li>
																					<li>
																						<a href="{{ route('web.category', $t->category->slug) }}"><span>{{ $t->category->name }}</span></a>
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
											<div class="col-lg-4 col-md-6 col-xs-12">
												<h4>No related video</h4>
											</div>
										@endif	
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