<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ImputationController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('imputations', [ImputationController::class , 'index'])
    ->name('imputations.index');

Route::delete('imputations/{imputation}', [ImputationController::class, 'delete'])
    ->name('imputations.delete');
