@component('mail::message')
# DEMANDE D'ORDRE DE MISSION

Bonjour, <br>
{{ $genre ? 'Mr' : 'Mme' }} {{ $demandeur }} a effectué une demande d'ordre de mission.
<br>
Merci d'etudier la demande en en cliquant sur le bounton ci-dessous.

@component('mail::button', ['url' => $link ])
Voir la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
