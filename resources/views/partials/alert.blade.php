@if(session('success'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            با موفقیت انجام شد
        </div>
    </div>
@endif

@if(session('failed'))
<div class="alert alert-danger" role="alert">
    <div class="alert-body">
        با خطا مواجه شدید
    </div>
</div>
@endif

@if(session('registred'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            @lang('public.new_registred')
        </div>
    </div>
@endif

@if(session('wrongCredentials'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            @lang('public.wrongCredentials')
        </div>
    </div>
@endif

@if(session('emailHasVerified'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            @lang('public.email_has_verified')
        </div>
    </div>
@endif


@if(session('resetLinkSent'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            @lang('public.resetLinkSent')
        </div>
    </div>
@endif

@if(session('resetLinkFailed'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            @lang('public.resetLinkFailed')
        </div>
    </div>
@endif

@if(session('cantChangePassword'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            @lang('public.cantChangePassword')
        </div>
    </div>
@endif

@if(session('passwordChanged'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            @lang('public.passwordChanged')
        </div>
    </div>
@endif
@if(session('magicLinkSent'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            @lang('public.magicLinkSent')
        </div>
    </div>
@endif
@if(session('invalidToken'))
    <div class="alert alert-warning" role="alert">
        <div class="alert-body">
            @lang('public.invalidToken')
        </div>
    </div>
@endif

@if(session('cantSendCode'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            @lang('public.cantSendCode')
        </div>
    </div>
@endif
@if(session('twoFactorActivated'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            @lang('public.twoFactorActivated')
        </div>
    </div>
@endif
@if(session('invalidCode'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            @lang('public.invalidCode')
        </div>
    </div>
@endif

