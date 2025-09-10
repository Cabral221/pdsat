<!DOCTYPE html>
<html lang ='fr'>
<head>
    <meta charset='UTF=8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Imputation Budgétaire | Impression</title>
    <link rel="stylesheet" href="{{ asset('fix/imputation.css') }}">
</head>
<body class="bod">
    <section class="entete">
        <img class="dra" src="{{ asset('images/drap.png') }}" alt="drapeau"/>
        <p class="rep">REPUBLIQUE DU SENEGAL</p>
        <p class="peup">Un Peuple-Un But-Une Foi</p>
        <p class="etoile">********</p>
        <p class="minis">MINISTERE DE LA FAMIILE ET DES SOLIDARITES</p>
        <p class="etoile">********</p>
        <p class="direc">DIRECTION DE L'ADMINISTRATION GENERALE<br/>ET DE L'EQUIPEMENT</p>
    </section><br/><br/>
    <section class="contenu">
        <h2 class="titr">IMPUTATION BUDGETAIRE</h2>
        <h3 class="design"> DESIGNATION DU SERVICE</h3>
        <section class="local">
            <ul>
                <li class="adress" >
                    <span> - </span>
                    <p>Ministère de la Famille et des Solidarités</p>
                </li>
                <li class="adress">
                    <span> - </span>
                    <p>Adresse précise : Bâtiment B, Sphère Ministérielle Habib THIAM du 2ème Arrondissement de Diamniadio</p>
                </li>
            </ul>
        </section>
        <h3 class="design">IMPUTATION BUDGETAIRE</h3>
        <section class="local">
            <ul>
                <li class="adress">
                    <span> - </span>
                    <p>Part à la charge de l'employé : 1/5</p>
                </li>
                <li class="adress">
                    <span> - </span>
                    <p>Part à la charge de l'employeur : 4/5 (Etat)</p>
                </li>
            </ul>
        </section>
        <section>
            <div class="t1">
                <div class="inline">
                    @if ($imputation->sick_name)
                        <span class="prenom">Prenom et nom du malade : </span>
                        <span class="vprenom">{{ $imputation->sick_name }}</span>
                    @else
                        <span class="prenom">Prenom et nom de l'agent : </span>
                        <span class="vprenom">{{ $imputation->agent }}</span>
                    @endif
                </div>
                <div class="inline">
                    <span class="prenom">Matricule de solde : </span>
                    <span class="vprenom">{{ $imputation->registration_number }}</span>
                </div>  
                <div class="inline">
                    <span class="prenom">Fonction : </span>
                    <span class="vprenom">{{ $imputation->fonction }}</span>
                </div>
                <div class="inline" style="max-width:700px;">
                    <span class="prenom">Service :</span>
                    <span class="vprenom">{{ $imputation->service->libele }}</span>
                </div>
            </div>
        </section>
    </section>
    <section class="pied">
        <p class="date">Dakar, le {{ Carbon\Carbon::now()->format('d/m/y'); }}</p>
        <p class="dage">Direction de l'Administration Générale et de l'Equipement</p>
        <p class="sign">(Signature et cachet du Directeur)</p>
        <!-- @if (!$imputation->hasBeenSigned())
        <form action="{{ $imputation->getSignatureRoute() }}" method="POST">
        @csrf
        <div style="text-align: right">
            <x-creagia-signature-pad />
        </div>
         </form>
        <script src="{{ asset('vendor/sign-pad/sign-pad.min.js') }}"></script>
        @endif -->
        <div class="signer">

            <img  src="{{ asset('images/signature.jpeg') }}" alt="signature"/>
        </div>
    </section>
    <footer>
        <hr id="tiret">
        <p class="ftext">Ministère de la Famille et des Solidarités - Bâtiment B - Deuxième Sphère Ministérielle de Diamniadio - Dakar</p>
    </footer>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            window.print()
        })
    </script>
</body>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        window.print()
     });
</script>
</html>
