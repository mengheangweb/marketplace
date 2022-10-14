@component('mail::message')
# Congratulations {{ $user->name  }}

You have successfully registered


@component('mail::button', ['url' => url('/my-profile')])
Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
