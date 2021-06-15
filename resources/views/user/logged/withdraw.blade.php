@extends('layout.main')
@push('css')
@endPush
@section('content')

<!-- ============ Body content start ============= -->
<div class="main-content">
    @include('partials.breadcrumb')
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-4">
        <div class="col-md-8 col-lg-8 col-sm-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Withdraw Balance</h4>
                    <form action="{{route('user.c.withdraw')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-400 mb-2">Amount</p>
                                <input class="form-control" type="text" name="amount" placeholder="Amount" value="" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-400 mb-2">Account Number</p>
                                <input class="form-control" type="text" name="account_number" placeholder="Account Number" value="" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-400 mb-2">Account Name</p>
                                <input class="form-control" type="text" name="account_name" placeholder="Account Name" value="" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-400 mb-2">Bank Name</p>
                                <input class="form-control" type="text" name="bank_name" placeholder="Bank Name" value="" required />
                            </div>
                        </div>
                    
                        <button class="btn btn-primary ml-2" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-lg-8 col-sm-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">My Withdraw</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Account Name</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($withdraw) > 0)
                                @php $sn = 0 @endphp
                                @foreach($withdraw as $ww)
                                @php $sn++ @endphp
                                <tr>
                                    <th scope="row">{{ $sn }}</th>
                                    <td>#{{$ww->amount}}</td>
                                    <td>{{$ww->account_number}}</td>
                                    <td>{{$ww->account_name}}</td>
                                    <td>{{$ww->bank_name}}</td>
                                    <td>
                                        @if($ww->status == 1)
                                        <span class="badge badge-success">Publish</span>
                                        @elseif($ww->status == 0)
                                        <span class="badge badge-success">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </div>
                            @endforeach
                            @else
                            <tr><td colspan="6" style="text-align: center;">No data found</td></tr>
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


