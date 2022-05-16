@component('mail::message')
# Logs

{{ $logs }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
