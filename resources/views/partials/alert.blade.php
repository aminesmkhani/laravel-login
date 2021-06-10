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
