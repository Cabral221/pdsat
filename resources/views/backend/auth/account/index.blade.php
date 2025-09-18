@extends('backend.layouts.app')

@section('title', __('Demandes d\'activation de comptes'))

@section('content')

    <x-backend.card>
        <x-slot name="header">Gestion des demandes d'activation des comptes d'utilisateurs</x-slot>
        <x-slot name="body">
             <table class="table">
                <thead>
                    <th>N° Matricule</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>CNI</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->registration_number }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->phone }}</td>
                        <td><a href="{{ asset($account->cni) }}" target="_blank" class="btn btn-primary btn-block">Ouvrir</a></td>
                        <td>
                            <a href="{{ route('admin.account.show', $account) }}" class="btn btn-primary">Voir</a>
                            {{-- <a href="{{ route('admin.auth.user.mark', [$user, 1]) }}" class="btn btn-success">Activer le compte</a> --}}
                            <a href="{{ route('admin.account.activate', $account) }}" class="btn btn-success">Activer le compte</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
             {{ $accounts->links() }}
        </x-slot>
    </x-backend.card>

@endsection
