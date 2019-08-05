@component('mail::message')
# Hello, {{ $name }}

Your Password reset token is - <a href="{{ url('/password/reset/'.$token) }}">Reset Password</a>

{{--  @component('mail::button', ['url' => ''])
Button Text
@endcomponent  --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
