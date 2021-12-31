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

                            <div class="col-md-6 mb-3">
                                <label for="">User</label>
                                <select class="form-control" name="user_id" required>
                                    <option>Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->username }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    <small>{!! $errors->get('user_id')[0] !!}</small>
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
