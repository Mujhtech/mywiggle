@extends('layout.auth')

@section('content')

    <!-- Recover-Password -->
    <section class="position-relative pb-0">
        <div class="recover-password-page-background" style="background-image:url('{{ asset('assets/img/background/asset-75.jpg') }}');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_recover_password_form" action="{{ route('auth.recover.post') }}" class="pms-form" method="post">
                            @csrf
                            <h4>Recover Password</h4>
                            <p class="font-weight-bold">Please enter your username or email address.<br>You will receive
                                a link to create a new
                                password via email.</p>
                            <ul class="pms-form-fields-wrapper pl-0 mb-4">
                                <li class="pms-field">
                                    <label for="id">Username or Email</label>
                                    <input name="id" type="text" value="">
                                    @if($errors->has('id'))
                                    <small>{!!  $errors->get('id')[0] !!}</small>
                                    @endif
                                </li>
                            </ul>
                            <input type="submit" name="submit" value="Reset Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recover-Password -->
@endsection