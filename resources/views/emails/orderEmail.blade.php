@component('mail::message')
# Hai ricevuto un nuovo ordine!

Nome: {{ $order->client_name }} {{ $order->client_lastname }},<br>
Indirizzo: {{ $order->client_address }} <br>
Indirizzo e-mail: {{ $order->client_email }} <br>
<br>
<hr>
# Ordine<br>
@foreach ($order->plates as $plate)
    Piatto: {{ $plate->name }} <br>
    Prezzo: &euro;{{ $plate->price }} <br>
    Quantit&aacute;: {{ $plate->pivot->quantity }}<br>
@endforeach
<hr>
Prezzo Totale: &euro;{{ $order->total }}

<br>
<br>
Grazie,<br>
{{ config('app.name') }}
@endcomponent
