@if(\Session::has('primary'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <i class="fa fa-info-circle"></i> {!!  \Session::get('primary')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti ti-close"></i>
    </button>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-info-circle"></i> {!!  \Session::get('success')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti ti-close"></i>
    </button>
</div>
@endif

@if(\Session::has('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info-circle"></i> {!!  \Session::get('info')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti ti-close"></i>
    </button>
</div>
@endif

@if(\Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa fa-info-circle"></i> {!!  \Session::get('danger')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti ti-close"></i>
    </button>
</div>
@endif