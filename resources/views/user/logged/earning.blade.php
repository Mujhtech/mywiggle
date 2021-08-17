@extends('layout.main')
@push('css')
@endPush
@section('content')

<!-- ============ Body content start ============= -->
<div class="main-content">
    @include('partials.breadcrumb')
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-4">
        <div class="col-md-12 col-lg-12 col-sm-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">My Earnings</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Points</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($earnings) > 0)
                                @php $sn = 0 @endphp
                                @foreach($earnings as $en)
                                @php $sn++ @endphp
                                <tr>
                                    <th scope="row">{{ $sn }}</th>
                                    <td>{{$en->amount}}</td>
                                    <td>{{$en->description}}</td>
                                </tr>
                            </div>
                            @endforeach
                            @else
                            <tr><td colspan="3" style="text-align: center;">No data found</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of row-->
<!-- end of main-content -->
</div>


@endSection
@push('js')

@foreach ($errors->all() as $error)
    <script type="text/javascript">
        new Toast({
            message: '{{ $error }}',
            type: 'error'
        });
    </script>
@endforeach


@endPush

@push('modals')
@endPush


