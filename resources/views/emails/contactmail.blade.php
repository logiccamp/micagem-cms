@component('mail::message')
# New Contact Message

<b>From</b><br>
{{$data["name"]}}
<br>
<b>Email</b><br>
{{$data["email"]}}

<b>Telephone</b><br>
{{$data["phone"]}}

<br>
<b>Message</b><br>
{{$data["message"]}}
<br>
<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent