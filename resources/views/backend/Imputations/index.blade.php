@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <x-backend.card>
        <x-slot name="header">Service d'Imputation Budgétaire</x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-sm-6">
                <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><h5>Total Demandes :</h5></div>
                                <div><h1 class="text-right">{{ $stats['total'] }}</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><h5>En attentes de validation :</h5></div>
                                <span><h2>{{ $stats['inactive'] }}</h2></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><h5>En attente de signatures :</h5></div>
                                <div><h1 class="text-right">{{ $stats['signature'] }}</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><h5>Imputation livrées :</h5></div>
                                <div><h1 class="text-right">{{ $stats['final'] }}</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-backend.card>

    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <h3>@lang('Demandes d\'imputations récentes')</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>N° Demande</td>
                        <td>Matricule</td>
                        <td>Prénom</td>
                        <td>Nom</td>
                        <td>Fonction</td>
                        <td>Service</td>
                        <td>Etat</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($imputations as $imputation)
                        <tr>
                            <td>{{ $imputation->id }}</td>
                            <td>{{ $imputation->registration_number }}</td>
                            <td>{{ $imputation->first_name }}</td>
                            <td>{{ $imputation->last_name }}</td>
                            <td>{{ $imputation->fonction }}</td>
                            <td>{{ $imputation->service->libele }}</td>
                            <td>
                                @if ($imputation->validation == false)
                                    <span class="badge badge-secondary">En attente de validation</span>
                                @else
                                    @if ($imputation->status == false)
                                        <span class="badge badge-warning">En attente de signature</span>
                                    @else
                                        <span class="badge badge-success">Disponible</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.imputations.show', $imputation) }}" class="btn btn-primary"> <span class="cil-eye btn-icon mr-2"></span> Examiner</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $imputations->links() }}
        </x-slot>
    </x-backend.card>
@endsection
