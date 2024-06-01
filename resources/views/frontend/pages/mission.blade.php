@extends('frontend.layouts.app')

@section('title', __('Ordre de Mission'))

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <x-frontend.card>
                <x-slot name="header">
                    <h2> @lang('Demande d\'ordre de mission')</h2>
                </x-slot>

                <x-slot name="body">
                    <form id="form_request_mission" class="form" action="{{ route('frontend.mission.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="genre" class="col-sm-4 col-form-label">Genre</label>
                            <div class="col-sm-8">
                                <div class="form-check m-1">
                                    <div>
                                        <input type="radio" class="form-check-input" id="genre_true" name="genre" value="1" checked>
                                        <label class="form-check-label mr-2" for="genre_true">Homme</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="form-check-input" id="genre_false" name="genre" value="0">
                                        <label class="form-check-label" for="genre_false">Femme</label>
                                    </div>
                                </div>
                                @error('genre')
                                <span class="invalide-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Prénom et Nom</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? '' }}">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fonction" class="col-sm-4 col-form-label">Fonction</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('fonction') is-invalid @enderror" id="fonction" name="fonction" value="{{ old('fonction') ?? '' }}">
                                @error('fonction')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matricule" class="col-sm-4 col-form-label">Matricule de solde</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" value="{{ old('matricule') ?? '' }}">
                                @error('matricule')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matrimonial" class="col-sm-4 col-form-label">Situation matrimoniale</label>
                            <div class="col-sm-8">
                                <div class="form-check m-1">
                                    <div>
                                        <input type="radio" class="form-check-input" id="matrimonial_true" name="matrimonial" value="1" checked>
                                        <label class="form-check-label mr-2" for="matrimonial_true">Marié(e)</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="form-check-input" id="matrimonial_false" name="matrimonial" value="0">
                                        <label class="form-check-label" for="matrimonial_false">Célibataire</label>
                                    </div>
                                </div>
                                @error('matrimonial')
                                <span class="invalide-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="depart_id" class="col-sm-4 col-form-label">Départ</label>
                            <div class="col-sm-8">
                                <select name="depart_id" id="depart" class="form-control @error('depart_id') is-invalid @enderror">
                                    <option value="" default>Selectionnez votre région de départ</option>
                                    {{-- @foreach ($services as $service) --}}
                                        <option value="1">Dakar</option>
                                        <option value="2">Saint-Louis</option>
                                    {{-- @endforeach --}}
                                </select>
                                @error('depart_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="arrive_id" class="col-sm-4 col-form-label">Arrivé</label>
                            <div class="col-sm-8">
                                <select name="arrive_id" id="depart" class="form-control @error('arrive_id') is-invalid @enderror">
                                    <option value="" default>Selectionnez votre région d'arrivé</option>
                                    {{-- @foreach ($services as $service) --}}
                                        <option value="1">Dakar</option>
                                        <option value="2">Saint-Louis</option>
                                    {{-- @endforeach --}}
                                </select>
                                @error('arrive_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mission_id" class="col-sm-4 col-form-label">Motif de la mission</label>
                            <div class="col-sm-8">
                                <select name="mission_id" id="depart" class="form-control @error('mission_id') is-invalid @enderror">
                                    <option value="" default>Selectionnez votre type de mission</option>
                                    {{-- @foreach ($services as $service) --}}
                                        <option value="1">Liaison administratif</option>
                                        <option value="2">autre type de mission</option>
                                    {{-- @endforeach --}}
                                </select>
                                @error('mission_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_depart" class="col-sm-4 col-form-label">Date de départ</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('date_depart') is-invalid @enderror" id="date_depart" name="date_depart" value="{{ old('date_depart') ?? '' }}">
                                @error('date_depart')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_arrive" class="col-sm-4 col-form-label">Date d'arrivé</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('date_arrive') is-invalid @enderror" id="date_arrive" name="date_arrive" value="{{ old('date_arrive') ?? '' }}">
                                @error('date_arrive')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vehicule" class="col-sm-4 col-form-label">Matricule véhicule</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('vehicule') is-invalid @enderror" id="vehicule" name="vehicule" value="{{ old('vehicule') ?? '' }}">
                                @error('vehicule')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carburant" class="col-sm-4 col-form-label">Avec carburant</label>
                            <div class="col-sm-8">
                                <div class="form-check m-1">
                                    <div>
                                        <input type="radio" class="form-check-input" id="carburant_true" name="carburant" value="1" checked>
                                        <label class="form-check-label mr-2" for="carburant_true">OUI</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="form-check-input" id="carburant_false" name="carburant" value="0">
                                        <label class="form-check-label" for="carburant_false">NON</label>
                                    </div>
                                </div>
                                @error('carburant')
                                <span class="invalide-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre_personne" class="col-sm-4 col-form-label">Nombre de personne à bord</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control @error('nombre_personne') is-invalid @enderror" id="nombre_personne" name="nombre_personne" value="{{ old('nombre_personne') ?? '' }}">
                                @error('nombre_personne')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-success">Soumettre</button>
                    </form>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-10-->
    </div><!--row-->
</div><!--container-->
@endsection
