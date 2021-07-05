@extends('layouts.auth-layouts')
@section('title',__('public.login_page_header'))
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">@lang('public.login_page_header')</h2>
                                </a>
                                <form class="auth-login-form mt-2" action="{{route('auth.login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">@lang('public.login_page_email')</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="@lang('public.login_page_email_placeholder')" aria-describedby="login-email" tabindex="1" autofocus />
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">@lang('public.login_page_password')</label>
                                            <a href="#">
                                                <small>@lang('public.login_page_forget_password')</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="remember-me" id="remember-me" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me">@lang('public.login_page_remember_me')</label>
                                        </div>
                                    </div>
                                    @include('partials.validation-errors')
                                    <button class="btn btn-primary btn-block" tabindex="4">@lang('public.login_page_enter_button')</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>فرد جدید هستید؟</span>
                                    <a href="{{route('auth.register')}}">
                                        <span>@lang('public.login_page_register_link')</span>
                                    </a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">یا</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="javascript:void(0)" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/page-auth-login.min.js')}}"></script>
@endsection
