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
                    <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#exampleModal">Add new video</button>
                    <h4 class="card-title mb-3">My Videos</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Number of views</th>
                                    <th scope="col">Likes</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($treads) > 0)
                                @php $sn = 0 @endphp
                                @foreach($treads as $tread)
                                @php $sn++ @endphp
                                <tr>
                                    <th scope="row">{{ $sn }}</th>
                                    <td><a href="{{ route('web.single', $tread->slug) }}">{{$tread->title}}</a></td>
                                    <td>
                                        {{$tread->views}}
                                    </td>
                                    <td>
                                        {{$tread->likes}}
                                    </td>
                                    <td>
                                        @if($tread->status == 1)
                                        <span class="badge badge-success">Publish</span>
                                        @elseif($tread->status == 2)
                                        <span class="badge badge-success">Draft</span>
                                        @elseif($tread->status == 0)
                                        <span class="badge badge-success">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal{{$tread->id}}"><i class="nav-icon i-Pen-2" title="Edit"></i></button>
                                        <a href="{{ route('user.v.delete', ['id' => $tread->id]) }}" class="btn btn-danger" type="button"><i class="nav-icon i-Close-Window" title="Delete"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal{{$tread->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit a tread</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="font-weight-400 mb-2">Title</p>
                                                            <input class="form-control" type="text" name="title" placeholder="Title" value="{{ $tread->title }}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="font-weight-400 mb-2">Category</p>
                                                            <select class="form-control" name="currency"/>
                                                            <option>Select Category</option>
                                                            @foreach($category as $cat)
                                                            <option value="{{$cat->id}}" @if($tread->category_id == $cat->id) selected @endif> {{$cat->name}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="font-weight-400 mb-2">Content</p>
                                                        <textarea class="form-control" name="content" placeholder="Content">{{ $tread->content }}</textarea>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('user.v.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new video</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-weight-400 mb-2">Title</p>
                            <input class="form-control" type="text" name="title" placeholder="Title" value="" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-weight-400 mb-2">Category</p>
                            <select class="form-control" name="category" required>
                            <option>Select Category</option>
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}"> {{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-weight-400 mb-2">Content</p>
                        <textarea class="form-control" name="content" placeholder="Content" require></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-weight-400 mb-2">Attached Video</p>
                        <input class="form-control" type="file" name="attachment" accept="video/*" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-weight-400 mb-2">Attached Featured Image</p>
                        <input class="form-control" type="file" name="featured_image" accept="image/*" required />
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


