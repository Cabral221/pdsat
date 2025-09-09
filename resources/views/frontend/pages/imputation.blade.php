
@extends('frontend.layouts.app')

@section('title', __('Imputation Budgétaire'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <x-frontend.card>
                    <x-slot name="header">
                       <h2> @lang('Demande d\'imputation Budgétaire')</h2>
                    </x-slot>

                    <x-slot name="body">
                        <form id="form_request_imputation" class="form" action="{{ route('frontend.imputation.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <fieldset class="fieldset">
                                <legend>Information de la personne Malade</legend>
                                <div class="form-group row">
                                    <label for="sick_name" class="col-sm-4 col-form-label">Penom et Nom de la personne malade</label>
                                    <div class="col-sm-8">
                                        {{-- Le boutton Check moi-memem  --}}
                                        <div class="custom-control custom-switch m-1">
                                            <input type="checkbox" class="custom-control-input" id="choice_sick" name="choice_sick" checked>
                                            <label class="custom-control-label" for="choice_sick">Moi-même</label>
                                        </div>
                                        {{-- end button check --}}
                                        <div class="input_sick d-none" id="input_sick">
                                            <input type="text" class="form-control @error('sick_name') is-invalid @enderror" id="sick_name" name="sick_name" placeholder="Prénom et NOM de la personne malade">
                                            @error('sick_name')
                                                <span class="invalide-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend>Informations personnelles de l'agent</legend>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-4 col-form-label">Prénom</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Entrer votre prénom" required>
                                        @error('first_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-4 col-form-label">Nom</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Entrer votre nom" required>
                                        @error('last_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">Téléphone</label>
                                    <div class="col-sm-8">
                                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Ex : 771234567" required>
                                        @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Adresse E-mail</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ex : abc@abc.com">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <fieldset>
                                <legend>Services</legend>
                                <div class="form-group row">
                                    <label for="matricule" class="col-sm-4 col-form-label">Matricule de solde</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('registration_number') is-invalid @enderror" id="matricule" name="registration_number" placeholder="Ex : 123456/A">
                                        @error('registration_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service" class="col-sm-4 col-form-label">Service</label>
                                    <div class="col-sm-8">
                                        <select name="service_id" id="service" class="form-control @error('service_id') is-invalid @enderror">
                                            <option value="" default>Selectionner votre service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->libele }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="service" class="col-sm-4 col-form-label">Fonction</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('fonction') is-invalid @enderror" id="fonction" name="fonction" placeholder="Ex : Informaticien">
                                        @error('fonction')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-block btn-success">Soumettre</button>
                        </form>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection


@push('after-scripts')
    <script type="text/javascript">

        $(document).ready(function ()  {
            $('#choice_sick').on('click', (e) => {
                // e.preventDefault()
                console.log($('#choice_sick').prop('checked'))
                if($('#choice_sick').prop('checked') == false){
                    // Si c est pas cocher , on affiche le input text
                    // avec attr : required
                    $('#input_sick').toggleClass('d-none')
                    $('#sick_name').prop('required', true)

                }else{
                    // si c est cocher , on cache le input
                    // sans attr : required
                    // remove value
                    $('#input_sick').toggleClass('d-none')
                    $('#input_sick').value('')
                    $('#sick_name').prop('required', false)
                }

            })
        });

    </script>
@endpush
