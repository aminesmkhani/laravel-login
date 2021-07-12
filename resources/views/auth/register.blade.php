@extends('layouts.auth-layouts')
@section('title',__('public.register_page_header'))
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
                        <!-- Register v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">@lang('public.register_page_header')</h2>
                                </a>
                                @include('partials.alert')
                                <form class="auth-register-form mt-2" action="{{route('auth.register')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">@lang('public.register_page_email')</label>
                                        <input type="text" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="@lang('public.register_page_email_placeholder')" aria-describedby="register-email" tabindex="2" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">@lang('public.register_page_name')</label>
                                        <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="@lang('public.register_page_name_placeholder')" aria-describedby="register-username" tabindex="1" autofocus />
                                    </div>

                                    <div class="form-group">
                                        <label for="register-password" class="form-label">@lang('public.register_page_password')</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">@lang('public.register_page_confirm_password')</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password_confirmation" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number" class="form-label">@lang('public.register_page_mobile')</label>
                                        <input type="text" value="{{old('phone_number')}}" class="form-control" id="phone_number" name="phone_number" placeholder="@lang('public.register_page_mobile_placeholder')" aria-describedby="register-username" tabindex="1" autofocus />
                                    </div>
                                    @include('partials.validation-errors')
                                    <button class="btn btn-primary btn-block" tabindex="5">@lang('public.register_page_enter_button')</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>از قبل حساب دارید؟</span>
                                    <a href="{{route('auth.login')}}">
                                        <span>@lang('public.register_page_login_link')</span>
                                    </a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">یا</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="javascript:void(0)" class="btn btn-facebook">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-twitter white">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Register v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/page-auth-login.min.js')}}"></script>
@endsection
