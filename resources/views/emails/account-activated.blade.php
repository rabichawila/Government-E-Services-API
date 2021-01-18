@component('mail::message')
## Hi {{ $user->firstname }}, your account as been successfully activated.

Please open your application and login.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
