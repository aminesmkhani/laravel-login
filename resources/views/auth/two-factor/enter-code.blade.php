@extends('layouts.layouts')

@section('title','احراز هویت ۲ مرحله ای ')


@section('content')
    <!-- Greetings Card starts -->
    <div class="col-lg-12 col-md-12 col-sm-12">
        @include('partials.alert')
        <div class="card card-congratulations">
            <div class="card-body text-center">
                <img src="{{asset('images/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                <img src="{{asset('images/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                <div class="avatar avatar-xl bg-success shadow">
                    <a style="color: white" href="#">
                        <div class="avatar-content">
                            <i data-feather="key" class="font-large-1"></i>
                        </div>
                    </a>
                </div>
                <div class="text-center">
                    <h1 class="mb-1 text-white">@lang('public.two_factor_success_title')</h1>
                    <p class="card-text m-auto w-75">
                        @lang('public.two_factor_send_code_success')
                    </p>
                    <br>
                    <form method="post" action="{{route('auth.two.factor.code')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="code" class="form-control" id="basicInput" placeholder="@lang('public.two_factor_enter_verify_code_placeholder')">
                        </div>
                        @include('partials.validation-errors')
                        <button class="btn btn-success waves-effect waves-float waves-light">@lang('public.two_factor_button')</button>
                        <a href="{{route('auth.two.factor.resent')}}" class="btn btn-warning waves-effect waves-float waves-light">@lang('public.two_factor_not_submit_code')</a>

                    </form>
                </div>

            </div>

        </div>

    </div>
    <!-- Greetings Card ends -->
@endsection
