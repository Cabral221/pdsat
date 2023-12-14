@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <x-backend.card>
        <x-slot name="header">Services</x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Liste des services du MDCSNEST</h3>
                    <table class="table">
                        <th>
                            <tr>
                                <td>Service</td>
                                <td>Abbréviation</td>
                            </tr>
                        </th>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->libele }}</td>
                                <td>{{ $service->cigle }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('admin.services.store') }}" method="post" class="form p-5 border border-primary rounded">
                        @csrf
                        @method('POST')
                        <h2>Ajouter un Service/Structure</h2>
                        <div class="form-group row">
                            <label for="service" class="col-sm-4 col-form-label">Nom du Service</label>
                            <div class="col-sm-8">
                                <input type="text" name="service" id="service" class="form-control @error('service') is-invalid @enderror" required>
                                @error('service')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cigle" class="col-sm-4 col-form-label">Abbréviation</label>
                            <div class="col-sm-8">
                                <input type="text" name="cigle" id="cigle" class="form-control @error('cigle') is-invalid @enderror" required>
                                @error('cigle')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-block btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>
    </x-backend.card>

@endsection
