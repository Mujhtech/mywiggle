@extends('layout.user')
@section('content')
<section class="gen-section-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12">
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="widget widget_search">
                    <form role="search" method="get" class="search-form" action="#">
                        <label>
                    	    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                        </label>
                        <button type="submit" class="search-submit"></button>
                    </form>
                </div>
			</div>
		</div>
	</div>
</section>
@endsection