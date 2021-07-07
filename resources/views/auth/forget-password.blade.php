@extends('layouts.auth-layouts')
@section('title',__('public.for_page_header'))
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
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">@lang('public.forget_page_header')</h2>
                                </a>

                                <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

                                <form class="auth-forgot-password-form mt-2" action="page-auth-reset-password-v1.html" method="POST">
                                    <div class="form-group">
                                        <label for="forgot-password-email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="forgot-password-email" name="forgot-password-email" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autofocus />
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="page-auth-login-v1.html"> <i data-feather="chevron-left"></i> Back to login </a>
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

