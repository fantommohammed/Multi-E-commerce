@extends('layouts.login')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1"><img src="" alt="branding logo">{{__('admin/setting.logindashboard')}}</div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily Using</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0 text-center">
                                        <a href="#" class="btn btn-social mb-1 mr-1 btn-outline-facebook"><span class="la la-facebook"></span> <span class="px-1">facebook</span> </a>
                                        <a href="#" class="btn btn-social mb-1 mr-1 btn-outline-google"><span class="la la-google-plus font-medium-4"></span> <span class="px-1">google</span> </a>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>OR Using Account
                                            Details</span></p>
                                    @include('dashboard.includes.alerts.errors')
                                    @include('dashboard.includes.alerts.success')
                                    <div class="card-body pt-0">
                                        <form class="form-horizontal" action="{{route('admin.postlogin')}}">
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="user-name">Your Username</label>
                                                <input type="text" class="form-control" id="user-name" placeholder="Your Username">
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="user-password">Enter Password</label>
                                                <input type="password" class="form-control" id="user-password" placeholder="Enter Password">
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to Modern
                                            ?</span></p>
                                    <div class="card-body">
                                        <a href="register-with-bg.html" class="btn btn-outline-danger btn-block"><i class="la la-user"></i>
                                            Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                            <span>{{__('admin/setting.logindashboard')}}</span></h6>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Easily Using</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="text-center">
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span
                                                class="la la-facebook"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span
                                                class="la la-twitter"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span
                                                class="la la-linkedin font-medium-4"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span
                                                class="la la-github font-medium-4"></span></a>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>OR Using Account
                                            Details</span></p>
                                    @include('dashboard.includes.alerts.errors')
                                    @include('dashboard.includes.alerts.success')
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{route('admin.postlogin')}}"
                                              method="post" novalidate>
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="email" class="form-control" id="user-name"
                                                       placeholder="{{__('admin/setting.enteremail')}}" required>
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" class="form-control"
                                                       id="user-password"
                                                       placeholder="{{__('admin/setting.enterpassword')}}" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label
                                                            for="remember-me">{{__('admin/setting.remember')}}</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a
                                                        href="recover-password.html" class="card-link">Forgot
                                                        Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i
                                                    class="ft-unlock"></i> Login
                                            </button>
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to Modern
                                            ?</span></p>
                                    <div class="card-body">
                                        <a href="register-with-bg-image.html"
                                           class="btn btn-outline-danger btn-block"><i class="la la-user"></i>
                                            Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->



@endsection
