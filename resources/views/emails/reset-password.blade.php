@component('mail::message')
# Forget Password


@component('mail::button', ['url' => $link])
Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
