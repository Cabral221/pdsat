@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
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
                            <td>{{ $imputation->service }}</td>
                            <td>
                                <a href="{{ route('admin.imputations.show', $imputation) }}" class="btn btn-primary"> <span class="cil-eye btn-icon mr-2"></span> Voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $imputations->links() }}
        </x-slot>
    </x-backend.card>
@endsection
