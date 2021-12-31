@extends('layout.admin')

@section('title', 'Add new user history')

@section('breadcrum', 'Add new user history')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Add new user history</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.h.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="user_id">Select User</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->username }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    <small>{!! $errors->get('user_id')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_content">Video Content</label>
                                <input type="text" class="form-control" name="video_content" placeholder="Video Content">
                                @if ($errors->has('video_content'))
                                    <small>{!! $errors->get('video_content')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_name">Video Name</label>
                                <input type="text" class="form-control" name="video_name" placeholder="Video Name">
                                @if ($errors->has('video_name'))
                                    <small>{!! $errors->get('video_name')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_number">Video Number</label>
                                <input type="text" class="form-control" name="video_number" placeholder="Video Number">
                                @if ($errors->has('video_number'))
                                    <small>{!! $errors->get('video_number')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" name="duration" placeholder="Duration">
                                @if ($errors->has('duration'))
                                    <small>{!! $errors->get('duration')[0] !!}</small>
                                @endif
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="total_likes">Total Likes</label>
                                <input type="text" class="form-control" name="total_likes" placeholder="Total Likes">
                                @if ($errors->has('total_likes'))
                                    <small>{!! $errors->get('total_likes')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="total_comments">Total Comments</label>
                                <input type="text" class="form-control" name="total_comments" placeholder="Total Comments">
                                @if ($errors->has('total_comments'))
                                    <small>{!! $errors->get('total_comments')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="purchase">Purchase</label>
                                <input type="text" class="form-control" name="purchase" placeholder="Purchase">
                                @if ($errors->has('purchase'))
                                    <small>{!! $errors->get('purchase')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="point">Point</label>
                                <input type="text" class="form-control" name="point" placeholder="Point">
                                @if ($errors->has('point'))
                                    <small>{!! $errors->get('point')[0] !!}</small>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount">
                                @if ($errors->has('amount'))
                                    <small>{!! $errors->get('amount')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
