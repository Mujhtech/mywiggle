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


                    <div class="row gx-3 p-3">

                        @if(count($treads) > 0)
                        @php $sn = 0 @endphp
                        @foreach($treads as $tread)
                        @php $sn++ @endphp

                        <div class="card mb-3 col-xl-6 col-lg-6 col-md-6">
                            <div class="row requests white-bg  wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="col-md-4 projects__thumb" style="background: url('{{ $tread->featured_image_url }}');  background-repeat: no-repeat; background-size: cover;">
                                </div>
                                <div class="col-md-8 projects__content">
                                    <h4 class="text-primary"><a href="{{ route('web.single', $tread->slug) }}">{{ $sn }}. {{ $tread->title }}</a></h4>
                                    <div class="skill mb-30">
                                       
                                       <p class="text-secondary" >Status<span>: @if($tread->status == 1)
                                        <span class="badge badge-success">Publish</span>
                                        @elseif($tread->status == 2)
                                        <span class="badge badge-success">Draft</span>
                                        @elseif($tread->status == 0)
                                        <span class="badge badge-success">Pending</span>
                                        @endif </span></p>
                                </div>
                                <div class="projects__content--manager">
                                    <ul class="request-manager">
                                        <li><a href="#">
                                            <img src="{{ $tread->user->profile_photo_url }}" alt="">
                                            <span>{{ $tread->user->username }}</span></a></li>
                                            <li>
                                                <p class="time"><i class="far fa-clock"></i> {{ $tread->created_at->diffForHumans() }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="btn bg-white _r_btn border-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="_dot _inline-dot bg-primary"></span><span class="_dot _inline-dot bg-primary"></span><span class="_dot _inline-dot bg-primary"></span></button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;"><a class="dropdown-item ul-widget__link--font" type="button" data-toggle="modal" data-target="#exampleModal{{$tread->id}}"><i class="i-Pen-2"> </i> Edit</a><a class="dropdown-item ul-widget__link--font" href="{{ route('user.v.delete', ['id' => $tread->id]) }}"><i class="i-Close-Window"> </i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                <button class="btn btn-primary ml-2" type="submit">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                    @endforeach
                    @else
                    <div class="col-md-12"><h4>No data found</h4></div>
                    @endif


                    </div>


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


