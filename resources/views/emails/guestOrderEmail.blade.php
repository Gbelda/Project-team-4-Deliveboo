@component('mail::message')
# Abbiamo ricevuto il tuo ordine!

<br>
<hr>
Riepilogo del Ordine:<br>
@foreach ($order->plates as $plate)
    Piatto: {{ $plate->name }} <br>
    Prezzo: &euro;{{ $plate->price }} <br>
    Quantit&aacute;: {{ $plate->pivot->quantity }}<br>
@endforeach
<hr>
Prezzo Totale: &euro;{{ $order->total }}

<br>
<br>
Grazie per aver ordinato da noi!<br>
{{ config('app.name') }}
@endcomponent
