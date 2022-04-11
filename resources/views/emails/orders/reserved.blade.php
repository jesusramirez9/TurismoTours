@component('mail::message')
# Estado de la reserva : Confirmado

<div align="center" style="margin: 1rem 0rem;">
    PROCESANDO ---- <b>RESERVADO</b>
</div>

Hola {{ $order->user()->first()->name }} te informamos que ya hemos procesado tu reserva. <br>
Te detallamos el resumen de tu reserva.
@component('mail::panel')
Tu numero de reserva es: <b> RESERVA-000{{ $order->id }}</b> <br>
@foreach ($items as $item)
Destino: <b>{{ $item->name }}</b> <br>
@endforeach
Te recogeremos en el siguiente punto:
<p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}</p>
@endcomponent

@component('mail::table')
       
| Precio | Cantidad | Total |
| ------------- |:-------------:| --------:|
@foreach ($items as $item)
| S/{{ $item->price }} | {{ $item->qty }} persona(s) | S/ {{ $order->total }} |
@endforeach
       
@endcomponent

En caso tengas algún inconveniente con tu reserva puedes <br> escribirnos a: 
info@aleckatravel.pe o enviarnos un mensaje a nuestro <br> wsp: +51 987 654 321 <br>
Gracias, <br>

{{ config('app.name') }}
@endcomponent
