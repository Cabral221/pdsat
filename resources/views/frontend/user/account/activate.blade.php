@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <hr>
                <h4 class="title text-primary text-center">Activer votre compte</h4>
                <hr>
                <form action="{{ route('frontend.auth.activate') }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="registration_number" class="col-sm-4 col-from-label">Matricule de solde</label>
                        <div class="col-sm-8">
                            <input type="text" name="registration_number" id="registration_number" class="form-control @error('registration_number') is-invalid @enderror" value="{{ old('registration_number') ?? '' }}">
                            @error('registration_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@exemple.com" value="{{ old('email') ?? '' }}" >
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 col-form-label">Numéro de téléphone</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+221</span>
                                </div>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="770001122" aria-describedby="inputGroupPrepend" value="{{ old('phone') ?? '' }}">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cni_file" class="col-sm-4 col-form-label">Joindre pièce d'identité</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control @error('cni') is-invalid @enderror" name="cni" id="cni_file">
                            @error('cni')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="formg-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
                        </div>
                    </div>
                </form>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
