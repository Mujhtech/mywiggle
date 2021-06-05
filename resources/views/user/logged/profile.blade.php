@extends('layout.main')
@push('css')

@endPush
@section('content')

<!-- ============ Body content start ============= -->
<div class="main-content">
    @include('partials.breadcrumb')
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-4">

        <div class="col-lg-4 col-md-6 mt-4">
            <div class="card mb-4 h-100">
                <div class="card-body">
                    <form action="{{ route('user.u.ppicture') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-title">Profile Picture</div>
                        <img src="{{ Auth::user()->profile_photo_url }}"alt="" style="display: block; border-radius: 50%; margin-left: 90px;" id="user_p_image">
                        <input type="file" style="display: none" id="profile_photo_path" name="profile_photo_path">
                        @if($errors->has('profile_photo_path'))
                            <small>{!!  $errors->get('profile_photo_path')[0] !!}</small>
                        @endif
                        <button class="btn btn-danger" type="submit" style="position: absolute;margin-left: 110px;margin-top: 10px;" type="button">Change</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- mask-form-->
        <div class="mt-4 col-lg-8 col-md-6">
            <div class="card bg-defualt text-black">
                <div class="card-body">
                    <form action="{{ route('user.u.profile') }}" method="POST" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mb-4"><i class="i-ID-Card text-22 mr-2"></i>
                            <h5 class="text-18 font-weight-700 card-title m-0">Edit Information</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="font-weight-400 mb-2">Full Name</p>
                                <input class="form-control" type="text" name="fullname" placeholder="Fullname" value="{{ Auth::user()->fullname }}" />
                                @if($errors->has('fullname'))
                                <small>{!!  $errors->get('fullname')[0] !!}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="font-weight-400 mb-2">Username</p>
                                <input class="form-control" type="text" name="username" placeholder="Username" value="{{ Auth::user()->username }}" />
                                @if($errors->has('username'))
                                <small>{!!  $errors->get('usernam')[0] !!}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="font-weight-400 mb-2">Email Address</p>
                                <input class="form-control" name="email" placeholder="Email Address" type="text" value="{{ Auth::user()->email }}" />
                                @if($errors->has('email'))
                                <small>{!!  $errors->get('email')[0] !!}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="font-weight-400 mb-2">Phone Number</p>
                                <input class="form-control" type="text" name="phone_number" placeholder="Phone Number" value="{{ Auth::user()->phone_number }}" />
                                @if($errors->has('phone_number'))
                                <small>{!!  $errors->get('phone_number')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <button class="btn float-right btn-danger" type="submit">Save</button>
                    </form>
                </div>
                <!-- -->
                <!-- -->
            </div>
        </div>

        <div class="mt-4 col-lg-12 col-md-6">
            <div class="card bg-defualt text-black">
                <div class="card-body">
                    <form action="{{ route('user.u.password') }}" method="POST" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mb-4"><i class="i-ID-Card text-22 mr-2"></i>
                            <h5 class="text-18 font-weight-700 card-title m-0">Change Password</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="font-weight-400 mb-2">Old Password</p>
                                <input class="form-control" type="password" name="old_password" placeholder="" value="" />
                                @if($errors->has('old_password'))
                                <small>{!!  $errors->get('old_password')[0] !!}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="font-weight-400 mb-2">New Password</p>
                                <input class="form-control" type="password" name="new_password" placeholder="" value="" />
                                @if($errors->has('new_password'))
                                <small>{!!  $errors->get('new_password')[0] !!}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="font-weight-400 mb-2">Confirm New Password</p>
                                <input class="form-control" name="confirm_new_password" type="password" value="" />
                                @if($errors->has('confirm_new_password'))
                                <small>{!!  $errors->get('confirm_new_password')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <button class="btn float-right btn-danger" type="submit">Save</button>
                    </form>
                </div>
                <!-- -->
                <!-- -->
            </div>
        </div>
    </div>
    <!-- end of row-->
    <!-- end of main-content -->
</div>

@endSection
@push('js')

<script>
    $(document).on('click','#user_p_image', function(event) {
        $('#profile_photo_path').click();
    });

    $(document).on('change','#profile_photo_path', function(event) {
        var p = 'profile_photo_path';
        upload_img(p);
    });

    function upload_img(a){
        console.log(a);
        var fuData = document.getElementById(a);
        var FileUploadPath = fuData.value;
        if (FileUploadPath == '') {
            alert("Please upload an image");
        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#user_p_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fuData.files[0]);
                }
            }
            else {
                alert("Sorry, Only Files With The Following Extensions are allowed: GIF, PNG, JPG, JPEG. ");

            }
        }

    }
</script>

@endPush

