@component('mail::message')
# Welcome to {{ config('app.name') }}
{{ $user->firstname }}, you recently registered on {{ config('app.name') }}

Please use the code below to acticate your account: 

## {{ $user->confirmation_code }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent