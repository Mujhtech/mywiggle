@extends('layout.admin')

@section('title', 'Settings')

@section('breadcrum', 'Settings')

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card card-statistics">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Settings</h4>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.p.setting') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">App Name</label>
							<input type="text" class="form-control" name="app-name" placeholder="App Name" value="{{ get_setting('app-name') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">App Logo</label>
							<input type="file" class="form-control" name="app-logo" placeholder="App Logo">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">App Description</label>
							<input type="text" class="form-control" name="app-description" placeholder="App Description" value="{{ get_setting('app-description') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Meta Descrition</label>
							<input type="text" class="form-control" name="meta-description" placeholder="Meta Description" value="{{ get_setting('meta-description') }}">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Android App Link</label>
							<input type="text" class="form-control" name="android-link" placeholder="Android App Link" value="{{ get_setting('android-link') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">iOS App Link</label>
							<input type="text" class="form-control" name="ios-link" placeholder="iOS App Link" value="{{ get_setting('ios-link') }}">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">App version</label>
							<input type="text" class="form-control" name="app-version" placeholder="App version" value="{{ get_setting('app-version') }}" readonly>
						</div>
						<div class="col-md-6 mb-3">
							<label for="">App Url</label>
							<input type="text" class="form-control" name="app-url" placeholder="App Url" value="{{ url('/') }}" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">App Email</label>
							<input type="text" class="form-control" name="app-email" placeholder="App Email" value="{{ get_setting('app-email') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">App Phone Number</label>
							<input type="text" class="form-control" name="app-phone-number" placeholder="App Phone Number" value="{{ get_setting('app-phone-number') }}">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Point Equal Balance</label>
							<input type="text" class="form-control" name="point-equal-balance" placeholder="Point Equal Balance" value="{{ get_setting('point-equal-balance') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Share Post Point</label>
							<input type="text" class="form-control" name="share-post-point" placeholder="Share Post Point" value="{{ get_setting('share-post-point') }}">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Twitter Page Link</label>
							<input type="text" class="form-control" name="twitter-link" placeholder="Twitter Page Link" value="{{ get_setting('twitter-link') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Instagram Page Link</label>
							<input type="text" class="form-control" name="instagram-link" placeholder="Instagram Page Link" value="{{ get_setting('instagram-link') }}">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Whatsapp Page Link</label>
							<input type="text" class="form-control" name="whatsapp-link" placeholder="Whatsapp Page Link" value="{{ get_setting('whatsapp-link') }}">
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Facebook Page Link</label>
							<input type="text" class="form-control" name="facebook-link" placeholder="Facebook Page Link" value="{{ get_setting('facebook-link') }}">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
                                <div class="checkbox checbox-switch switch-success">
                                    <label>
                                        <input type="checkbox" name="enable-ads" @if(get_setting("enable-ads")) checked @endif>
                                        <span></span>
                                        Enable Ads
                                    </label>
                                </div>
                            </div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
                                <div class="checkbox checbox-switch switch-success">
                                    <label>
                                        <input type="checkbox" name="enable-withdraw" @if(get_setting("enable-withdraw")) checked @endif>
                                        <span></span>
                                        Enable Withdrawal Form
                                    </label>
                                </div>
                            </div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="">Header Code Snippet</label>
							<textarea class="form-control" name="header-code" placeholder="Header Code Snippet">{{ get_setting('header-code') }}</textarea>
						</div>
						<div class="col-md-6 mb-3">
							<label for="">Footer Code Snippet</label>
							<textarea class="form-control" name="footer-code" placeholder="Footer Code Snippet">{{ get_setting('footer-code') }}</textarea>
						</div>
					</div>

					<button class="btn btn-primary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection