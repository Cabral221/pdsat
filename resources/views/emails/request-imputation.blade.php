@component('mail::message')
# DEMANDE D'IMPUTATION BUDGETAIRE

Bonjour, <br>
Mr(Mme) {{ $demandeur }} a effectué une demande d'imputation Budgétaire.
<br>
Merci d'etudier la demande en en cliquant sur le bounton ci-dessous.

@component('mail::button', ['url' => $link ])
Voir la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
