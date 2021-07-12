@extends('layouts.auth-layouts')
@section('title',__('public.reset_password_page_header'))
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
                        <!-- Reset Password v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">@lang('public.reset_password_page_header')</h2>
                                </a>

                                <p class="card-text mb-2">@lang('public.reset_password_page_alert_message')</p>
                                @include('partials.alert')

                                <form class="auth-reset-password-form mt-2" action="{{route('auth.password.reset')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="email">@lang('public.reset_password_your_email')</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="email" class="form-control form-control-merge" id="reset-password-new" readonly value="{{$email}}" name="email" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="1" autofocus />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="reset-password-new">@lang('public.reset_password_page_new_password')</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="reset-password-new" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="1" autofocus />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="reset-password-confirm">@lang('public.reset_password_page_confirm_password')</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="reset-password-confirm" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-confirm" tabindex="2" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    @include('partials.validation-errors')
                                    <button class="btn btn-primary btn-block" tabindex="3">@lang('public.reset_password_page_button')</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{route('auth.login')}}"> <i data-feather="chevron-left"></i> @lang('public.reset_password_back_to_login') </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Reset Password v1 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/page-auth-reset-password.min.js')}}"></script>
@endsection
