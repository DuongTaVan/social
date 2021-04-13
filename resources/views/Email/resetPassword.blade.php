@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
<a href="{{config('app.url')}}/check-token-reset-password-at/{{$token}}">click here</a>
@endcomponent
