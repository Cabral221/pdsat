@component('mail::message')
# IMPUTATION BUDGETAIRE

Bonjour Mr(Mme) {{ $demandeur }},<br>

Votre imputation Budgétaire est disponible. Veuillez le télécharger en piéce jointe.
<br>


Merci,<br>
{{ config('app.name') }}
@endcomponent
