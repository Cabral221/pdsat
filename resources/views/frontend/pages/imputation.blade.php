
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
                            <fieldset class="fieldset">
                                <legend>Information de la personne Malade</legend>
                                <div class="form-group">
                                    <label for="sick_name">Penom et Nom de la personne malade</label>
                                    <input type="text" class="form-control @error('sick_name') is-invalid @enderror" id="sick_name" name="sick_name" placeholder="Prénom et NOM de la personne malade">
                                    @error('sick_name')
                                    <span class="invalide-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend>Informations personnelles de l'agent</legend>
                                <div class="form-group">
                                    <label for="first_name">Prénom de l'agent</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Entrer votre prénom" required>
                                    @error('first_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Nom de l'agent</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Entrer votre nom" required>
                                    @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Ex : 771234567" required>
                                    @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ex : abc@abc.com">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                            <hr>
                            <fieldset>
                                <legend>Services</legend>
                                <div class="form-group">
                                    <label for="matricule">Matricule de solde</label>
                                    <input type="text" class="form-control @error('registration_number') is-invalid @enderror" id="matricule" name="registration_number" placeholder="Ex : 123456/A">
                                    @error('registration_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="service">Service</label>
                                    <input type="text" class="form-control @error('service') is-invalid @enderror" id="service" name="service" placeholder="Ex : Cellule Informatique">
                                    @error('service')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="service">Fonction</label>
                                    <input type="text" class="form-control @error('fonction') is-invalid @enderror" id="fonction" name="fonction" placeholder="Ex : Informaticien">
                                    @error('fonction')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
