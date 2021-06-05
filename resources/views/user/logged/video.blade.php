@extends('layouts.student')
@push('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" /> -->
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
                    <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#exampleModal">Create a request</button>
                    <h4 class="card-title mb-3">My Request</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Request Media</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($requests) > 0)
                                @php $sn = 0 @endphp
                                @foreach($requests as $request)
                                @php $sn++ @endphp
                                <tr>
                                    <th scope="row">{{ $sn }}</th>
                                    <td>{{$request->title}}</td>
                                    <td>
                                        @if($request->is_fund_request)
                                            {{$request->currency->code}} {{$request->amount}}
                                        @endif

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        @if($request->status == 1)
                                        <span class="badge badge-success">Paid</span>
                                        @elseif($request->status == 2)
                                        <span class="badge badge-success">Accepted</span>
                                        @elseif($request->status == 3)
                                        <span class="badge badge-success">Failed</span>
                                        @elseif($request->status == 0)
                                        <span class="badge badge-success">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal{{$request->id}}"><i class="nav-icon i-Pen-2" title="Edit"></i></button>
                                        <a href="{{ route('student.fund.delete', ['id' => $request->id]) }}" class="btn btn-danger" type="button"><i class="nav-icon i-Close-Window" title="Delete"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('student.fund.edit', ['id' => $request->id])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create a request</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="font-weight-400 mb-2">Title</p>
                                                            <input class="form-control" type="text" name="title" placeholder="Title" value="{{ $request->title }}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="font-weight-400 mb-2">Currency</p>
                                                            <select class="form-control" name="currency"/>
                                                            <option>Select currency</option>
                                                            @foreach($currency as $cur)
                                                            <option value="{{$cur->id}}" @if($request->currency_id == $cur->id) selected @endif> {{$cur->name}} ({{$cur->code}})</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="font-weight-400 mb-2">Amount</p>
                                                        <input class="form-control" type="number" name="amount" placeholder="Amount" value="{{ $request->amount }}" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="font-weight-400 mb-2">Description</p>
                                                        <textarea class="form-control" name="description" placeholder="Description">{{ $request->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="font-weight-400 mb-2">Attached File</p>
                                                        <input class="form-control" type="file" name="attachment"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-primary ml-2" type="submit">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
<!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

<!-- include('partials.error', ['position' => 'toast-bottom-left' ]) -->
<!-- include('partials.flash', ['position' => 'toast-bottom-left', 'timeout' => 1000 ]) -->

@endPush

@push('modals')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('student.fund.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a request</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-weight-400 mb-2">Title</p>
                            <input class="form-control" type="text" name="title" placeholder="Title" value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-weight-400 mb-2">Currency</p>
                            <select class="form-control" name="currency"/>
                            <option>Select currency</option>
                            @foreach($currency as $cur)
                                <option value="{{$cur->id}}"> {{$cur->name}} ({{$cur->code}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-weight-400 mb-2">Amount</p>
                        <input class="form-control" type="number" name="amount" placeholder="Amount" value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-weight-400 mb-2">Description</p>
                        <textarea class="form-control" name="description" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-weight-400 mb-2">Attached File</p>
                        <input class="form-control" type="file" name="attachment"/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary ml-2" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
</div>
@endPush

