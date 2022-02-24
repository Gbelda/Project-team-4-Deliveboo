@component('mail::message')
# Hai ricevuto un nuovo ordine!

Nome: {{ $name }} {{ $lastname }},<br>
Indirizzo: {{ $address }} <br>
Indirizzo e-mail: {{ $email }} <br>
Ordine:

Grazie,<br>
{{ config('app.name') }}
@endcomponent
