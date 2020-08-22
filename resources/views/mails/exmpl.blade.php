
@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you for choosing US!

Voici Votre Code de commande que vous pouvez utilser pour suivre l'éta de votre commande 
**{{$code}}**
@component('mail::button', ['url' => $link])
Suivre Ma Commande
@endcomponent
Sincerely,  
THE BEST TEAM, THE GREATEST TEAM, VERY VERY GREAT TEAM, team.
@endcomponent