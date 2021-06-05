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
                <form action="{{route('student.profile.edit')}}" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="card mb-4 h-100">
                            <div class="card-body">
                                <div class="card-title">Profile Picture</div>
                                <img src="{{ Auth::user()->profile_photo_url }}"alt="" style="display: block; border-radius: 50%; margin-left: 90px;" id="user_p_image">
                                <input type="file" style="display: none" id="profile_photo_path" name="profile_photo_path">
                                <button class="btn btn-danger" id="select_img" style="position: absolute;margin-left: 110px;margin-top: 10px;" type="button">Change</button>
                            </div>
                        </div>
                    </div>

                    <!-- mask-form-->
                    <div class="mt-4 col-lg-8 col-md-6">
                        <div class="card bg-defualt text-black">
                            <!-- -->
                            <!-- -->
                            <div class="card-body">
                                <!-- -->
                                <!-- -->
                                <div class="d-flex align-items-center mb-4"><i class="i-ID-Card text-22 mr-2"></i>
                                    <h5 class="text-18 font-weight-700 card-title m-0">Edit Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="font-weight-400 mb-2">Full Name</p>
                                        <input class="form-control" type="text" name="name" placeholder="Fullname" value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <p class="font-weight-400 mb-2">Username</p>
                                        <input class="form-control" type="text" name="username" placeholder="Username" value="{{ Auth::user()->username }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <p class="font-weight-400 mb-2">Email Address</p>
                                        <input class="form-control" name="email" placeholder="Email Address" type="text" value="{{ Auth::user()->email }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <p class="font-weight-400 mb-2">Phone Number</p>
                                        <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="{{ Auth::user()->phone }}" />
                                    </div>
                                </div>
                                <button class="btn float-right btn-danger" type="submit">Edit</button>
                            </div>
                            <!-- -->
                            <!-- -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- end of row-->
            <!-- end of main-content -->
        </div>

    @endSection
    @push('js')
        <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

        <!-- include('partials.error', ['position' => 'toast-bottom-left' ]) -->
        <!-- include('partials.flash', ['position' => 'toast-bottom-left', 'timeout' => 1000 ]) -->
        <script>
            $(document).on('click','#select_img', function(event) {
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

