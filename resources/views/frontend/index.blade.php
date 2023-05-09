@extends('frontend.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-9 text-center">
            <div class="card bg-dark text-white border-0">
                <img class="card-img" src="{{ asset('img/logo-mdcsnest-h.PNG') }}" alt="Card image">
              </div>

            <h3 class="title">Bénéficier de nos services en ligne</p>

            <div class="flex flex-wrap flex-center justify-content-center text-white">
                <a href="{{ route('frontend.imputation.index') }}" class="card bg-primary m-3" style="max-width: 18rem; min-width: 14rem">
                    <div class="card-body">
                        <h5 class="card-title">Imputation Budgétaire</h5>
                    </div>
                </a>
                <a href="#" class="card bg-success m-3" style="max-width: 18rem; min-width: 14rem">
                    <div class="card-body">
                        <h5 class="card-title">Ordre de missions</h5>
                    </div>
                </a>
                <a href="#" class="card bg-danger m-3" style="max-width: 18rem; min-width: 14rem">
                    <div class="card-body">
                        <h5 class="card-title">Imputation Budgétaire</h5>
                    </div>
                </a>
                <a href="#" class="card bg-warning m-3" style="max-width: 18rem; min-width: 14rem">
                    <div class="card-body">
                        <h5 class="card-title">Imputation Budgétaire</h5>
                    </div>
                </a>
                <a href="#" class="card bg-info m-3" style="max-width: 18rem; min-width: 14rem">
                    <div class="card-body">
                        <h5 class="card-title">Imputation Budgétaire</h5>
                    </div>
                </a>
                <a href="#" class="card bg-secondary m-3" style="max-width: 18rem; min-width: 14rem">
                    <div class="card-body">
                        <h5 class="card-title">Imputation Budgétaire</h5>
                    </div>
                </a>
            </div>
        </div><!--col-md-10-->
    </div><!--row-->
</div><!--container-->
@endsection
