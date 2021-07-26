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
                <div class="avatar avatar-xl bg-warning shadow">
                    <a style="color: white" href="#">
                        <div class="avatar-content">
                            <i data-feather="key" class="font-large-1"></i>
                        </div>
                    </a>
                </div>
               @if(Auth::user()->hasTwoFactor())
                    <div class="text-center">
                        <h1 class="mb-1 text-white">@lang('public.2_auth_title')</h1>
                        <p class="card-text m-auto w-75">
                            @lang('public.two_factor_active',['number' => Auth::user()->phone_number])
                        </p>
                        <br>
                        <a href="{{route('auth.two.factor.deactivate')}}" class="btn btn-warning waves-effect waves-float waves-light">@lang('public.two_factor_button_deactivate')</a>
                    </div>

                @else
                    <div class="text-center">
                        <h1 class="mb-1 text-white">@lang('public.2_auth_title')</h1>
                        <p class="card-text m-auto w-75">
                            @lang('public.two_factor_inactive',['number' => Auth::user()->phone_number])
                        </p>
                        <br>
                        <a href="{{route('auth.two.factor.activate')}}" class="btn btn-warning waves-effect waves-float waves-light">@lang('public.two_factor_button')</a>
                    </div>
               @endif

            </div>

        </div>

    </div>
    <!-- Greetings Card ends -->
@endsection
