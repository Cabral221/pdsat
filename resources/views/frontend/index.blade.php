@extends('frontend.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- section -->
            <section class="my-3 services">
                <div class="service-annonce text-center">
                    Bénéficiez de vos services en toute simplicité !
                </div>
                <!-- Row  -->
                <div class="row my-2">
                    <!-- Column -->
                    <div class="col-md-3">
                        <a href="{{ route('frontend.imputation.index') }}" class="card card-service">
                            <img src="{{ asset('images/sante.jpg') }}" alt="card image" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">Imputation Bugétaire</h5>
                                <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe nisi nesciunt...</p> -->
                            </div>
                        </a>                        
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-3">
                        <a href="{{ route('frontend.mission.index') }}" class="card card-service">
                            <img src="{{ asset('images/sante.jpg') }}" alt="card image" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">Ordre de Mission</h5>
                                <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe nisi nesciunt...</p> -->
                            </div>
                        </a>                        
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-3">
                        <a href="#" class="card card-service">
                            <img src="{{ asset('images/sante.jpg') }}" alt="card image" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">Détachement de Service</h5>
                                <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe nisi nesciunt...</p> -->
                            </div>
                        </a>                        
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-3">
                        <a href="#" class="card card-service">
                            <img src="{{ asset('images/sante.jpg') }}" alt="card image" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">Décision de Congé</h5>
                                <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe nisi nesciunt...</p> -->
                            </div>
                        </a>                        
                    </div>
                    <!-- Column -->
                </div>
            </section>
            <!-- end section -->
            <!-- section -->
            <section class="my-3">
                <div class="service-annonce text-center">
                    Nos plateformes digitales
                </div>
            </section>
            <!-- end section -->
        </div><!--col-md-10-->
    </div><!--row-->
</div><!--container-->
@endsection
