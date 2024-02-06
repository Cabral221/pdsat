<!DOCTYPE html>
<html lang ='en'>
<head>
    <meta charset='UTF=8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Imputation</title>
    <!-- Custom Style-->
    <link rel="stylesheet" href="{{ asset('css/imputation.css') }}">
</head>
<body class="bod">
    <section class="entete">
        <img class="dra" src="{{ asset('images/drap.png') }}" alt="drapeau"/>
        <p class="rep">REPUBLIQUE DU SENEGAL</p>
        <p class="peup">Un Peuple-Un But-Une Foi</p>
        <p class="etoile">********</p>
        <p class="minis">MINISTERE DU DEVELOPPEMENT COMMUNAUTAIRE,<br/>
            DE LA SOLIDARITE NATIONALE, DE L'EQUITE SOCIALE<br/>
            ET TERRITORIALE
        </p>
        <p class="etoile">********</p>
        <p class="direc">DIRECTION DE L'ADMINISTRATION GENERALE ET<br/> DE L'EQUIPEMENT</p>
    </section><br/><br/><br/>
    <section class="contenu">
        <h2 class="titr">IMPUTATION BUDGETAIRE</h2><br/>
        <h3 class="design"> DESIGNATION DU SERVICE</h3>
        <section class="local">
            <ul>
                <li class="adress" > - Ministère du Développement communautaire, de la Solidarité nationale et de l'Equité sociale et territoriale</li>
                <li class="adress"> - Adresse précise : Bâtiment B, Sphère Ministérielle Habib THIAM du 2ème Arrondissement de Diamniadio</li>
            </ul>
        </section>
        <h3 class="design">IMPUTATION BUDGETAIRE</h3>
        <section>
            <ul>
                <li class="adress">- Part à la charge de l'employé : 1/5</li>
                <li class="adress">- Part à la charge de l'employeur : 4/5 (Etat)</li>
            </ul>
        </section><br/>
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
                    <span class="prenom">Fonction : </span>
                    <span class="vprenom">{{ $imputation->fonction }}</span>
                </div>
                <div class="inline">
                    <span class="prenom">Matricule de solde : </span>
                    <span class="vprenom">{{ $imputation->registration_number }}</span>
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
        <p class="sign">(Signature et cachet du Directeur)</p><br/><br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </section>
    <footer>
        <hr id="tiret">
        <p class="ftext">Ministère du Développement communautaire, de la Solidarité nationale et de l'Equité sociale et territoriale Bâtiment B - Deuxième Sphère Ministérielle de Diamniadio - Dakar</p>
    </footer>
</body>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        window.print()
     });
</script>
</html>
