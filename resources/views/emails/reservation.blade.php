@component('mail::message')
# Greetings {{ $reciever_name }}

{{ $message }}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ $sender_name }}
@endcomponent
