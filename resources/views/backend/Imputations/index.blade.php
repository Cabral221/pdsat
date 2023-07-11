@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <h3>@lang('Demandes d\'imputations récentes')</h3>
            <table class="table">
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
                                @if ($imputation->validation)
                                    <button type="button" class="btn btn-warning"><span class="cil-print btn-icon mr-2"></span> Imprimer</button>
                                @else
                                    <form action="{{ route('admin.imputations.active', $imputation) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-primary"><span class="cil-check-circle btn-icon mr-2"></span> Valider</button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.imputations.delete', $imputation) }}" method="post" id="form_delete_imp_{{ $imputation->id }}"  style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger"
                                    onclick="if(confirm('Etes vous sur de vouloir supprimer cette demande')){document.getElementById('form_delete_imp_{{ $imputation->id }}').submit();}">
                                    <span class="cil-trash btn-icon mr-2"></span> Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $imputations->links() }}

        </x-slot>
    </x-backend.card>
@endsection
