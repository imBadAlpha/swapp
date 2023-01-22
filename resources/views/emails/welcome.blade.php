<x-mail::message>
# Hi! This is a welcome email.

You are reading a body of an email

<x-mail::button :url="''">
Visit Site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
