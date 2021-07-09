@extends('layouts.auth-layouts')
@section('title',__('public.forget_password_page_header'))
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
                        <!-- Forgot Password v1 -->
                        <div class="card mb-0">
                            @include('partials.alert')
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">@lang('public.forget_password_page_header') </h2>
                                </a>

                                <p class="card-text mb-2">@lang('public.forget_password_page_form_description')</p>

                                <form class="auth-forgot-password-form mt-2" action="{{route('auth.password.forget')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">@lang('public.forget_password_page_email')</label>
                                        <input type="text" class="form-control" id="forgot-password-email" name="email" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autofocus />
                                    </div>
                                    @include('partials.validation-errors')
                                    <button class="btn btn-primary btn-block" tabindex="2">@lang('public.forget_password_page_send_link_text')</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{route('auth.login')}}"> <i data-feather="chevron-left"></i> @lang('public.forget_password_page_back_login') </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Forgot Password v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@section('js')
<script src="{{asset('vendor/page-auth-forgot-password.min.js')}}"></script>
@endsection

