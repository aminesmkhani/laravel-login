@extends('layouts.auth-layouts')
@section('title',__('public.magic_login_page_header'))
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
                                    <h2 class="brand-text text-primary ml-1">@lang('public.magic_login_page_header')</h2>
                                </a>
                                @include('partials.alert')
                                <form class="auth-login-form mt-2" action="{{route('auth.magic.send.token')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">@lang('public.magic_login_page_email')</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="@lang('public.magic_login_page_email_placeholder')" aria-describedby="login-email" tabindex="1" autofocus />
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" tabindex="3" />
                                            <label class="custom-control-label" for="remember">@lang('public.magic_login_page_remember_me')</label>
                                        </div>
                                    </div>
                                    @include('partials.validation-errors')
                                    <button class="btn btn-primary btn-block" tabindex="4">@lang('public.magic_login_page_button')</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>روش های دیگر را تست کنید؟</span>
                                    <a href="{{route('auth.login')}}">
                                        <span>@lang('public.magic_login_page_any_methods')</span>
                                    </a>
                                </p>

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
