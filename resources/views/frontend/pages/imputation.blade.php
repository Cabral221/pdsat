
@extends('frontend.layouts.app')

@section('title', __('Imputation Budgétaire'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="card bg-dark text-white border-0">
                <img class="card-img" src="{{ asset('img/logo-mdcsnest-h.PNG') }}" alt="Card image">
            </div>

            <div class="col-md-9">
                <x-frontend.card>
                    <x-slot name="header">
                       <h2> @lang('Demande d\'imputation Budgétaire au MDCSNEST')</h2>
                    </x-slot>

                    <x-slot name="body">
                        <form id="form_request_imputation" class="form" action="{{ route('frontend.imputation.store') }}" method="POST">
                            @csrf
                            @method('POST')

                            <fieldset class="fielset">
                                <legend>Informations personnelles de l'agent</legend>
                                <div class="form-group">
                                    <label for="first_name">Prénom de l'agent</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Entrer votre prénom">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Nom de l'agent</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Entrer votre nom">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Ex : 771234567">
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ex : abc@abc.com">
                                </div>
                                <div class="form-group">
                                    <label for="sick_name">Penom et Nom du malade</label>
                                    <input type="text" class="form-control" id="sick_name" name="sick_name" placeholder="Prénom et NOM de la personne malade">
                                </div>
                            </fieldset>
                            <hr>
                            <fieldset>
                                <legend>Services</legend>
                                <div class="form-group">
                                    <label for="matricule">Matricule de solde</label>
                                    <input type="text" class="form-control" id="matricule" name="registration_number" placeholder="Ex : 123456/A">
                                </div>
                                <div class="form-group">
                                    <label for="service">Service</label>
                                    <input type="text" class="form-control" id="service" name="service" placeholder="Ex : Cellule Informatique">
                                </div>
                                <div class="form-group">
                                    <label for="service">Fonction</label>
                                    <input type="text" class="form-control" id="fonction" name="fonction" placeholder="Ex : Informaticien">
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </form>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
