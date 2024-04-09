<x-mail::message>
# Introduction

The body of your message.

{{-- <x-mail::button :url="'http://localhost:4200/response-password-reset?token=' . $token"> --}}
Here is your token for password reset: <b>{{ $token }}</b>
{{-- Button Text --}}
{{-- </x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
