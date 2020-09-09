
@component('mail::message')
Bonjour **{{$name}}**,  {{-- use double space for line break --}}
Merci de nous avoir choisis!

Voici le code pour suivre l'éta de votre commande 
**{{$code}}**
@component('mail::button', ['url' => $link])
Suivre Ma Commande
@endcomponent
Cordialement,  
Compa Ny.
@endcomponent