<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\ImputationController;
use App\Http\Controllers\Frontend\MissionController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });


// Routes frontend des imputations
Route::get('imputations', [ImputationController::class, 'index'])->name('imputation.index');
Route::post('imputations', [ImputationController::class, 'store'])->name('imputation.store');

// Routes frontend des ordres de mission
Route::get('missions', [MissionController::class, 'index'])->name('mission.index');
Route::post('missions', [MissionController::class, 'store'])->name('mission.store');
