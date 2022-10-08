@component('mail::message')
# New Quote Request Message

<b>From</b><br>
{{$data["name"]}}
<br>
<b>Email</b><br>
{{$data["email"]}}

<br>
<b>Message</b><br>
{{$data["message"]}}
<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent