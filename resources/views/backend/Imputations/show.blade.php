@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <h3>@lang('Demande d\'imputation')</h3>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="border-left p-2">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">N° Demande</span>
                            <Span class="font-weight-bold">{{ $imputation->id }}</Span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Matricule</span>
                            <span class="font-weight-bold">{{ $imputation->registration_number }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Prénom</span>
                            <span class="font-weight-bold">{{ $imputation->first_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Nom</span>
                            <span class="font-weight-bold">{{ $imputation->last_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Fonction</span>
                            <span class="font-weight-bold">{{ $imputation->fonction }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Service</span>
                            <span class="font-weight-bold">{{ $imputation->service }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Email</span>
                            <span class="font-weight-bold">{{ $imputation->email }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Téléphone</span>
                            <span class="font-weight-bold">{{ $imputation->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="border-left  p-2">
                        <diV class="d-flex justify-content-between">
                            <span class="">Nom de la personne Malade</span>
                            <span class="font-weight-bold">{{ $imputation->sick_name }}</span>
                        </diV>
                    </div>
                </div>
            </div>

            <div class="pt-4 text-center">
                @if ($imputation->validation)
                    <a href="{{ route('admin.imputations.print', $imputation) }}" class="btn btn-warning"><span class="cil-print btn-icon mr-2"></span> Imprimer</a>
                    <a href="#" class="btn btn-secondary"><span class="cil-print btn-icon mr-2"></span> Charger</a>
                    {{-- Option desactiver demande --}}
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
                    <span class="cil-trash btn-icon mr-2"></span> Supprimer
                </button>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
